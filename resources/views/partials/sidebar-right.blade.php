<spark-notifications
        :notifications="notifications"
        :has-unread-announcements="hasUnreadAnnouncements"
        :loading-notifications="loadingNotifications" inline-template>

    <div id="right-sidebar">
        <div class="sidebar-container">
            <ul class="nav nav-tabs">
                <li class="active" style="width: 50%;" :class="{'active': showingNotifications}" @click="showNotifications">
                    <a data-toggle="tab" href="#tab-1" style="font-size: 10px;">Notifications</a>
                </li>
                <li style="width: 50%;" :class="{'active': showingAnnouncements}" @click="showAnnouncements">
                    <a data-toggle="tab" href="#tab-2" style="font-size: 10px;">Announcements <i class="fa fa-circle text-danger p-l-xs" v-if="hasUnreadAnnouncements"></i></a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane active" v-if="showingNotifications">
                    <div v-if="loadingNotifications" class="text-center">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>Loading Notifications
                    </div>
                    <div v-if=" ! loadingNotifications && activeNotifications.length == 0" class="sidebar-title">
                        <h3><i class="fa fa-comments-o"></i> Nothing to show you</h3>
                        <small><i class="fa fa-tim"></i>We don't have anything to show you right now! But when we do, we'll be sure to let you know. Talk to you soon!</small>
                    </div>
                    <div v-if="showingNotifications && hasNotifications">
                        <div class="sidebar-message" v-for="notification in notifications.notifications">
                            <a>
                                <div class="pull-left text-center">
                                    <img v-if="notification.creator" :src="notification.creator.photo_url" alt="image">
                                    <span v-else class="fa-stack fa-2x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa @{{ notification.icon }} fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p>
                                        <span v-if="notification.creator">@{{ notification.creator.name }}</span>
                                        <span v-else>Spark</span>
                                    </p>
                                    @{{{ notification.parsed_body }}}
                                    <br>
                                    <a :href="notification.action_url" class="btn btn-sm btn-primary" v-if="notification.action_text">
                                        @{{ notification.action_text }}
                                    </a>
                                    <br>
                                    <small class="text-muted pull-right">@{{ notification.created_at | relative }}</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="tab-2" class="tab-pane active" v-if="showingAnnouncements && hasAnnouncements">
                    <div class="sidebar-message" v-for="announcement in notifications.announcements">
                        <a>
                            <div class="pull-left text-center">
                                <img :alt="announcement.creator.name" class="img-circle message-avatar" :src="announcement.creator.photo_url">
                            </div>
                            <div class="media-body">
                                <p>@{{ announcement.creator.name }}</p>
                                @{{{ announcement.parsed_body }}}
                                <br>
                                <a :href="announcement.action_url" class="btn btn-sm btn-primary" v-if="announcement.action_text">
                                    @{{ announcement.action_text }}
                                </a>
                                <br>
                                <small class="text-muted pull-right">@{{ announcement.created_at | relative }}</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-notifications>