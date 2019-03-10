<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Voice Note Management</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add New Voice <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>Date Posted</th>
                    <th>Event Date</th>
                    <th>Minister</th>
                    <th>Voice Title</th>
                    <th>Link</th>
                    <th>Action</th>
                  </tr>
                  <tr v-for="note in audioNote" :key="note.id">
                    <td>{{ note.created_at | myDate}}</td>
                    <td> {{ note.date_of_event | myDate}} </td>
                    <td> {{ note.minister }} </td>
                    <td><span class="tag tag-success"> {{ note.title}} </span></td>
                    <td> {{ note.link}} </td>
                    <td>
                        <a @click="editModal(note)">
                            <i class="fa fa-edit text-blue"></i>
                        </a>
                        |
                        <a @click="deleteLog(note.id)">
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
                    <form @submit.prevent="editMode ? updateAudioNote() : createAudioNote()">
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="members" v-model="form.members" id="members" class="form-control" :class="{ 'is-invalid' : form.errors.has('members') }">
                                <option value="">Select Members</option>
                                <option value="1">Abhishek Shrivastava</option>
                                <option value="2">Femi Adeko</option>
                            </select>
                            <has-error :form="form" field="members"></has-error>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Minister Name" name="minister" id="minister" v-model="form.minister" class="form-control" :class="{ 'is-invalid' : form.errors.has('minister') }">
                            <has-error :form="form" field="minister"></has-error>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Title" name="title" id="title" v-model="form.title" class="form-control" :class="{ 'is-invalid' : form.errors.has('title') }">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="form-group">
                            <input type="date" placeholder="Date Of Event" name="date_of_event" id="date_of_event" v-model="form.date_of_event" class="form-control" :class="{ 'is-invalid' : form.errors.has('date_of_event') }">
                            <has-error :form="form" field="date_of_event"></has-error>
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
                audioNote : {},
                form: new Form({
                    id: '',
                    members : '',
                    minister : '',
                    title : '',
                    date_of_event : '',
                    uploadAudioNote : ''
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
                    this.form.delete('api/audioNote/'+id).then(() => {
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
            loadAudioNote() {
                axios.get("api/audioNote").then(({ data }) => (this.audioNote = data.data));
            },
            updateAudioNote() {
                this.$Progress.start();
                this.form.put('api/audioNote/'+this.form.id)
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
            createAudioNote() {
                this.$Progress.start();
                this.form.post('api/audioNote')
                .then(() => {
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Audio Note Created successfully'
                    });

                    this.$Progress.finish();
                })
                .catch(() => {});
            }
        },
        created() {
            this.loadAudioNote();
            Fire.$on('AfterCreate', () => {
                this.loadAudioNote();
            });
        }
    }
</script>
