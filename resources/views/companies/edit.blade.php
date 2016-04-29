<update-company-details :user="user" inline-template>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Company information</h5>
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
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-4 control-label">Company name</label>
                    <div class="col-md-6">
                        <input type="text" name="name" v-model="name" placeholder="Company name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Website url</label>
                    <div class="col-md-6">
                        <input type="url" name="website" v-model="website" placeholder="Website url" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Description</label>
                    <div class="col-md-6">
                        <textarea name="description" v-model="description" id="description" placeholder="Description" class="form-control" rows="6"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary" @click.prevent="update" :disabled="updating">Change company details</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</update-company-details>