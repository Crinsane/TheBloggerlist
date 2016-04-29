<spark-redeem-coupon :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Redeem Coupon</h5>
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
            
            <div class="alert alert-success" v-if="form.successful">
                Coupon accepted! The discount will be applied to your next invoice.
            </div>

            <form class="form-horizontal" role="form">
                <!-- Coupon Code -->
                <div class="form-group" :class="{'has-error': form.errors.has('coupon')}">
                    <label class="col-md-4 control-label">Coupon Code</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="coupon" v-model="form.coupon">

                        <span class="help-block" v-show="form.errors.has('coupon')">
                            @{{ form.errors.get('coupon') }}
                        </span>
                    </div>
                </div>

                <!-- Redeem Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="redeem"
                                :disabled="form.busy">

                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Redeeming
                            </span>

                            <span v-else>
                                Redeem
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-redeem-coupon>
