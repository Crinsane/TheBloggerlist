<spark-update-extra-billing-information :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Extra Billing Information</h5>
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

            <!-- Information Message -->
            <div class="alert alert-info">
                This information will appear on all of your receipts, and is a great place to add your full
                business name, VAT number, or address of record. Do not include any confidential or
                financial information such as credit card numbers.
            </div>

            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your billing information has been updated!
            </div>

            <!-- Extra Billing Information -->
            <form class="form-horizontal" role="form">
                <div class="form-group" :class="{'has-error': form.errors.has('information')}">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="7" v-model="form.information" style="font-family: monospace;"></textarea>

                        <span class="help-block" v-show="form.errors.has('information')">
                            @{{ form.errors.get('information') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group m-b-none">
                    <div class="col-md-offset-4 col-md-8 text-right">
                        <button type="submit" class="btn btn-primary" @click.prevent="update" :disabled="form.busy">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-extra-billing-information>
