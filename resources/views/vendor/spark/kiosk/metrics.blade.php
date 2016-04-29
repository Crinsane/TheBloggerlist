<spark-kiosk-metrics :user="user" inline-template>
    <!-- The Landsman™ -->
    <div>
        <div class="row">
            <!-- Monthly Recurring Revenue -->
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Monthly Recurring Revenue</h5>
                        <h1 class="no-margins">@{{ monthlyRecurringRevenue | currency spark.currencySymbol }}</h1>
                        <div class="stat-percent font-bold text-navy" v-if="monthlyChangeInMonthlyRecurringRevenue">@{{ monthlyChangeInMonthlyRecurringRevenue }}% From Last Month</div>
                        <div class="stat-percent font-bold text-navy" v-if="yearlyChangeInMonthlyRecurringRevenue">@{{ yearlyChangeInMonthlyRecurringRevenue }}% From Last Year</div>
                    </div>
                </div>
            </div>

            <!-- Yearly Recurring Revenue -->
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Yearly Recurring Revenue</h5>
                        <h1 class="no-margins">@{{ yearlyRecurringRevenue | currency spark.currencySymbol }}</h1>
                        <div class="stat-percent font-bold text-navy" v-if="monthlyChangeInYearlyRecurringRevenue">@{{ monthlyChangeInYearlyRecurringRevenue }}% From Last Month</div>
                        <div class="stat-percent font-bold text-navy" v-if="yearlyChangeInYearlyRecurringRevenue">@{{ yearlyChangeInYearlyRecurringRevenue }}% From Last Year</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Total Volume -->
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Total Volume</h5>
                        <h1 class="no-margins">@{{ totalVolume | currency spark.currencySymbol }}</h1>
                    </div>
                </div>
            </div>

            <!-- Total Trial Users -->
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Users Currently Trialing</h5>
                        <h1 class="no-margins">@{{ totalTrialUsers }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Recurring Revenue Chart -->
        <div class="row" v-show="indicators.length > 0">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Monthly Recurring Revenue</h5>
                    </div>
                    <div class="ibox-content">
                        <canvas id="monthlyRecurringRevenueChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Yearly Recurring Revenue Chart -->
        <div class="row" v-show="indicators.length > 0">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Yearly Recurring Revenue</h5>
                    </div>
                    <div class="ibox-content">
                        <canvas id="yearlyRecurringRevenueChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-show="indicators.length > 0">
            <!-- Daily Volume Chart -->
            <div class="col-md-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daily Volume</h5>
                    </div>
                    <div class="ibox-content">
                        <canvas id="dailyVolumeChart" height="100"></canvas>
                    </div>
                </div>
            </div>

            <!-- Daily New Users Chart -->
            <div class="col-md-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>New Users</h5>
                    </div>
                    <div class="ibox-content">
                        <canvas id="newUsersChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribers Per Plan -->
        <div class="row" v-if="plans.length > 0">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Subscribers Per Plan</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-borderless m-b-none">
                            <thead>
                                <th>Name</th>
                                <th>Subscribers</th>
                                <th>Trialing</th>
                            </thead>

                            <tbody>
                                <tr v-for="plan in plans">
                                    <!-- Plan Name -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ plan.name }} (@{{ plan.interval | capitalize }})
                                        </div>
                                    </td>

                                    <!-- Subscriber Count -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ plan.count }}
                                        </div>
                                    </td>

                                    <!-- Trialing Count -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ plan.trialing }}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-kiosk-metrics>
