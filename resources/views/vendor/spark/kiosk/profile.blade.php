<spark-kiosk-profile :user="user" :plans="plans" inline-template>
    <div>
        <!-- Loading Indicator -->
        <div class="row" v-if="loading">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>Loading
                    </div>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div v-if=" ! loading && profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                                <h5><i class="fa fa-btn fa-times" style="cursor: pointer;" @click="showSearch"></i>@{{ profile.name }}</h5>

                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link" v-if="spark.usesStripe && profile.stripe_id" @click="addDiscount(profile)">
                                    <i class="fa fa-gift"></i>
                                </a>
                                <a class="close-link" @click="impersonate(profile)" :disabled="user.id === profile.id">
                                    <i class="fa fa-user-secret"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <!-- Profile Photo -->
                                <div class="col-md-3 text-center">
                                    <img :src="profile.photo_url" class="spark-profile-photo-xl">
                                </div>

                                <div class="col-md-9">
                                    <!-- Email Address -->
                                    <p>
                                        <strong>Email Address:</strong> <a href="mailto:@{{ profile.email }}">@{{ profile.email }}</a>
                                    </p>

                                    <!-- Joined Date -->
                                    <p>
                                        <strong>Joined:</strong> @{{ profile.created_at | datetime }}
                                    </p>

                                    <!-- Subscription -->
                                    <p>
                                        <strong>Subscription:</strong>

                                        <span v-if="activePlan(profile)">
                                            <a :href="customerUrlOnBillingProvider(profile)" target="_blank">
                                                @{{ activePlan(profile).name }} (@{{ activePlan(profile).interval | capitalize }})
                                            </a>
                                        </span>

                                        <span v-else>
                                            None
                                        </span>
                                    </p>

                                    <!-- Total Revenue -->
                                    <p>
                                        <strong>Total Revenue:</strong> @{{ revenue | currency spark.currencySymbol }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teams -->
            <div class="row" v-if="spark.usesTeams && profile.owned_teams.length > 0">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Teams
                        </div>

                        <div class="panel-body">
                            <table class="table table-borderless m-b-none">
                                <thead>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Subscription</th>
                                </thead>

                                <tbody>
                                    <tr v-for="team in profile.owned_teams">
                                        <!-- Photo -->
                                        <td>
                                            <img :src="team.photo_url" class="spark-team-photo">
                                        </td>

                                        <!-- Team Name -->
                                        <td>
                                            <div class="btn-table-align">
                                                @{{ team.name }}
                                            </div>
                                        </td>

                                        <!-- Subscription -->
                                        <td>
                                            <div class="btn-table-align">
                                                <span v-if="activePlan(team)">
                                                    <a :href="customerUrlOnBillingProvider(team)" target="_blank">
                                                        @{{ activePlan(team).name }} (@{{ activePlan(team).interval | capitalize }})
                                                    </a>
                                                </span>

                                                <span v-else>
                                                    None
                                                </span>
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

        <!-- Apply Discount Modal -->
        <div>
            @include('spark::kiosk.modals.add-discount')
        </div>
    </div>
</spark-kiosk-profile>
