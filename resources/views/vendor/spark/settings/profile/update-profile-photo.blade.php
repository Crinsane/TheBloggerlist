<spark-update-profile-photo :user="user" inline-template>
    <div>
        <div class="ibox float-e-margins" v-if="user">
            <div class="ibox-title">
                <h5>Profile Photo</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a></li>
                        <li><a href="#">Config option 2</a></li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="alert alert-danger" v-if="form.errors.has('photo')">
                    @{{ form.errors.get('photo') }}
                </div>

                <form class="form-horizontal" role="form">
                    <!-- Photo Preview-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <span role="img" class="profile-photo-preview"
                                :style="previewStyle">
                            </span>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="form.busy">
                                <span>Select New Photo</span>

                                <input v-el:photo type="file" class="form-control" name="photo" @change="update">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</spark-update-profile-photo>
