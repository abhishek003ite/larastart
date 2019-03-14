<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Word Log Management</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>Date Posted</th>
                    <th>Date Preached</th>
                    <th>Preacher Name</th>
                    <th>Topic Preached</th>
                    <th>Description</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="log in wordlog" :key="log.id">
                    <td>{{log.date_created | myDate}}</td>
                    <td> {{log.date_preached | myDate}} </td>
                    <td> {{log.preacher_name | upText}} </td>
                    <td><span class="tag tag-success"> {{log.topic}} </span></td>
                    <td> {{log.message}} </td>
                    <td>
                        <a @click="editModal(log)">
                            <i class="fa fa-edit text-blue"></i>
                        </a>
                        |
                        <a @click="deleteLog(log.id)">
                            <i class="fa fa-trash text-red"></i>
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Add New Word Log</h5>
                    <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update Word Log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form @submit.prevent="editMode ? updateWordlog() : createWordlog()">
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="members" v-model="form.members" id="members" class="form-control" :class="{ 'is-invalid' : form.errors.has('members') }">
                                <option value="">Select Members</option>
                                <!-- <option value="1">Abhishek Shrivastava</option>
                                <option value="2">Femi Adeko</option> -->
                                <option v-for="member in allMembers" :value="member.id">{{ member.preacher_name }}</option>
                            </select>
                            <has-error :form="form" field="members"></has-error>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Preacher Name" name="preacher_name" id="preacher_name" v-model="form.preacher_name" class="form-control" :class="{ 'is-invalid' : form.errors.has('preacher_name') }">
                            <has-error :form="form" field="preacher_name"></has-error>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Topic Preached" name="topic" id="topic" v-model="form.topic" class="form-control" :class="{ 'is-invalid' : form.errors.has('topic') }">
                            <has-error :form="form" field="topic"></has-error>
                        </div>
                        <div class="form-group">
                            <input type="date" placeholder="Date Preached" name="date_preached" id="date_preached" v-model="form.date_preached" class="form-control" :class="{ 'is-invalid' : form.errors.has('date_preached') }">
                            <has-error :form="form" field="date_preached"></has-error>
                        </div>
                        <div class="form-group">
                            <textarea v-model="form.message" name="message" id="message"
                            placeholder="Message"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                            <has-error :form="form" field="message"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="!editMode" type="submit" class="btn btn-primary">Share With Members</button>
                        <button v-show="editMode" type="submit" class="btn btn-primary">Update Record</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editMode: false,
                wordlog : {},
                allMembers: {},
                form: new Form({
                    id: '',
                    members : '',
                    preacher_name : '',
                    topic : '',
                    date_preached : '',
                    message : '',
                    uploadFile : '',
                    checkRadio : ''
                })
            }
        },
        methods: {
            editModal(log) {
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(log);
            },
            newModal() {
                this.editMode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteLog(id) {
                swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //Send HTTP Request to server
                    this.form.delete('api/wordlog/'+id).then(() => {
                        if (result.value) {
                            swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }
                        Fire.$emit('AfterCreate');
                    }).catch(() => {
                        swal.fire(
                            "Failed!",
                            "There was something wrong!",
                            "warning"
                        );
                    });
                })
            },
            loadWordlog() {
                axios.get("api/wordlog").then(({ data }) => (this.wordlog = data.data));
                axios.get("api/wordlog/create").then(({ data }) => (this.allMembers = data.data));
            },
            updateWordlog() {
                this.$Progress.start();
                this.form.put('api/wordlog/'+this.form.id)
                .then(() => {
                    $('#addNew').modal('hide');
                    swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            createWordlog() {
                this.$Progress.start();
                this.form.post('api/wordlog')
                .then(() => {
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Wordlog Created successfully'
                    });

                    this.$Progress.finish();
                })
                .catch(() => {});
            }
        },
        created() {
            this.loadWordlog();
            Fire.$on('AfterCreate', () => {
                this.loadWordlog();
            });
        }
    }
</script>
