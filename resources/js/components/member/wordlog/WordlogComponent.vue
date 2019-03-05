<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Word Log Management</h3>

                <div class="card-tools">
                  <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New <i class="fas fa-user-plus fa-fw"></i></button>
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
                  <tr>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td></td>
                    <td>
                        <a href="">
                            <i class="fa fa-edit text-blue"></i>
                        </a>
                        |
                        <a href="">
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
                    <h5 class="modal-title" id="addNewLabel">Add New Word Log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                    <button type="button" class="btn btn-primary">Share With Members</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
