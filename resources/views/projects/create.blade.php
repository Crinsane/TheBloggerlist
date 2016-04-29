@extends('layouts.master')

@section('title', 'Create Project')

@section('content')
<create-project :user="user" inline-template>
    <div class="animated fadeInUp">
        <form role="form">

            <div class="row">
                <div class="col-md-9">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Create a new project</h5>
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
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Project title" v-model="title">
                            </div>

                            <div class="form-group summernote-bordered">
                                <textarea name="description" class="form-control" id="summernote" v-model="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Project meta</h5>
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
                            <div class="form-group">
                                <label for="bloggers">Maximum number of bloggers</label>
                                <input type="number" name="bloggers" id="bloggers" class="form-control input-sm" v-model="bloggers">
                            </div>
                            <div class="form-group">
                                <label for="start">Start & end date</label>
                                <div class="input-daterange input-group input-group-sm" id="datepicker">
                                    <input type="text" name="start_at" id="start" class="form-control" v-model="start">
                                    <span class="input-group-addon">to</span>
                                    <input type="text" name="end_at" id="end" class="form-control" v-model="end">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="priority"><input type="checkbox" name="priority" value="1" class="i-checks" v-model="priority">&nbsp;&nbsp;High priority?</label>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-block" @click.prevent="store" :disabled="storing"><i class="fa fa-floppy-o"></i> Save project</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</create-project>
@endsection