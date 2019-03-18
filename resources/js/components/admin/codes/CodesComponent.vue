<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Code Management</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>Date Created</th>
                    <th>URL & Code</th>
                    <th>Status</th>
                    <th>Used Date</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="code in codes" :key="code.id">
                    <td>{{ code.created_at | myDate}}</td>
                    <td> {{ code.code}} </td>
                    <td> {{ code.status}} </td>
                    <td>{{ code.used }}</td>
                    <td>
                        <!-- <a @click="editModal(code)">
                            <i class="fa fa-edit text-blue"></i>
                        </a>
                        | -->
                        <a @click="deleteCodes(code.id)">
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
                    <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Add Codes</h5>
                    <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update Codes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form @submit.prevent="editMode ? updateCode() : createCode()">
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="queryCode" v-model="form.queryCode" id="queryCode" class="form-control" :class="{ 'is-invalid' : form.errors.has('queryCode') }">
                                <option value="10">Number Of Codes</option>
                                    <option value="1">1</option>
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                <!-- <option value="1">Abhishek Shrivastava</option>
                                <option value="2">Femi Adeko</option> -->
                                <!-- <option v-for="member in allMembers" :value="member.id">{{ member.preacher_name }}</option> -->
                            </select>
                            <has-error :form="form" field="queryCode"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="!editMode" type="submit" class="btn btn-primary">Create Codes</button>
                        <button v-show="editMode" type="submit" class="btn btn-primary">Update Codes</button>
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
                codes : {},
                form: new Form({
                    id: '',
                    queryCode : '',
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
            deleteCodes(id) {
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
                    this.form.delete('api/codes/'+id).then(() => {
                        if(result.value) {
                            swal.fire(
                                'Deleted',
                                'Your code has been deleted.',
                                'success'
                            )
                        }
                        Fire.$emit('AfterCreate');
                    }).catch(() => {
                        swal.fire(
                            'Failed!',
                            'There was something wrong!',
                            'warning'
                        );
                    });
                })
            },
            // deleteLog(id) {
            //     swal.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     type: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         //Send HTTP Request to server
            //         this.form.delete('api/wordlog/'+id).then(() => {
            //             if (result.value) {
            //                 swal.fire(
            //                 'Deleted!',
            //                 'Your file has been deleted.',
            //                 'success'
            //                 )
            //             }
            //             Fire.$emit('AfterCreate');
            //         }).catch(() => {
            //             swal.fire(
            //                 "Failed!",
            //                 "There was something wrong!",
            //                 "warning"
            //             );
            //         });
            //     })
            // },
            loadCodes() {
                axios.get("api/codes").then(({ data }) => (this.codes = data.data));
            },
            // updateWordlog() {
            //     this.$Progress.start();
            //     this.form.put('api/wordlog/'+this.form.id)
            //     .then(() => {
            //         $('#addNew').modal('hide');
            //         swal.fire(
            //             'Updated!',
            //             'Information has been updated.',
            //             'success'
            //             )
            //             this.$Progress.finish();
            //              Fire.$emit('AfterCreate');
            //     })
            //     .catch(() => {
            //         this.$Progress.fail();
            //     });
            // },
            createCode() {
                this.$Progress.start();
                this.form.post('api/codes')
                .then(() => {
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Codes Generated successfully.'
                    });

                    this.$Progress.finish();
                })
                .catch(() => {});
            }
        },
        created() {
            this.loadCodes();
            Fire.$on('AfterCreate', () => {
                this.loadCodes();
            });
        }
    }
</script>
