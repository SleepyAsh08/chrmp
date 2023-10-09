<template>

    <Head>
        <title>Home</title>
    </Head>

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item w-100">
            <div class="row gap-20">
                <!-- #Toatl Visits ==================== -->
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Number of Participants</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                <span class="icon-holder">
                                    <icon name="users"></icon>
                                </span>
                                    <span id="sparklinedash"></span>
                                </div>
                                <div class="peer">
                                    <span class="
                                            d-ib
                                            lh-0
                                            va-m
                                            fw-600
                                            bdrs-10em
                                            pX-15
                                            pY-15
                                            bgc-green-50
                                            c-green-500
                                        ">{{ participants }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #Total Page Views ==================== -->
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Attended on Day 1</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span class="icon-holder">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                    </svg>
                                </span>
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                    <span class="
                                            d-ib
                                            lh-0
                                            va-m
                                            fw-600
                                            bdrs-10em
                                            pX-15
                                            pY-15
                                            bgc-red-50
                                            c-red-500
                                        ">{{ day1 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #Unique Visitors ==================== -->
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Attended on Day 2</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span class="icon-holder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                        </svg>
                                    </span>
                                    <span id="sparklinedash3"></span>
                                </div>
                                <div class="peer">
                                    <span class="
                                            d-ib
                                            lh-0
                                            va-m
                                            fw-600
                                            bdrs-10em
                                            pX-15
                                            pY-15
                                            bgc-purple-50
                                            c-purple-500
                                        ">{{ day2 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #Bounce Rate ==================== -->
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Attended on Day 3</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span class="icon-holder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                        </svg>
                                    </span>
                                    <span id="sparklinedash4"></span>
                                </div>
                                <div class="peer">
                                    <span class="
                                            d-ib
                                            lh-0
                                            va-m
                                            fw-600
                                            bdrs-10em
                                            pX-15
                                            pY-15
                                            bgc-blue-50
                                            c-blue-500
                                        ">{{ day3 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-12">
            <!-- #Site Visits ==================== -->
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="layers">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Participants per Chapter</h6>
                            </div>
                            <div class="layer w-100">
                                <total-user :chartData="totalUser"></total-user>
                            </div>
                        </div>
                    </div>
                    <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                        <div class="layers">
                            <div class="layer w-100">
                                <div class="layers">
                                    <div class="layer w-100">
                                        <h5 class="mB-5">{{ DDO }}</h5>
                                        <small class="fw-600 c-grey-700">Davao de Oro Chapter</small>
                                        <span class="pull-right c-grey-600 fsz-sm">{{ DDOPercent+"%"}}</span>
                                        <div class="progress mT-10">
                                            <div class="
                                                    progress-bar
                                                    bgc-deep-purple-500
                                                " role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100" :style="'width: ' + DDOPercent + '%'">
                                                <span class="visually-hidden">50% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer w-100 mT-15">
                                        <h5 class="mB-5">{{ DDN }}</h5>
                                        <small class="fw-600 c-grey-700">Davao del Norte Chapter</small>
                                        <span class="pull-right c-grey-600 fsz-sm">{{ DDNPercent + "%" }}</span>
                                        <div class="progress mT-10">
                                            <div class="
                                                    progress-bar
                                                    bgc-green-500
                                                " role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100" :style="'width: ' + DDNPercent + '%'">
                                                <span class="visually-hidden">80% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer w-100 mT-15">
                                        <h5 class="mB-5">{{ DDSO}}</h5>
                                        <small class="fw-600 c-grey-700">Davao del Sur/Occidental Chapter</small>
                                        <span class="pull-right c-grey-600 fsz-sm">{{ DDSOPercent + "%" }}</span>
                                        <div class="progress mT-10">
                                            <div class="
                                                    progress-bar
                                                    bgc-light-blue-500
                                                " role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100" :style="'width: ' + DDSOPercent + '%'">
                                                <span class="visually-hidden">40% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer w-100 mT-15">
                                        <h5 class="mB-5">{{ Davao }}</h5>
                                        <small class="fw-600 c-grey-700">Davao City</small>
                                        <span class="pull-right c-grey-600 fsz-sm">{{ DavaoPercent + "%" }}</span>
                                        <div class="progress mT-10">
                                            <div class="
                                                    progress-bar
                                                    bgc-blue-grey-500
                                                " role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100" :style="'width: ' + DavaoPercent + '%'">
                                                <span class="visually-hidden">90% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer w-100 mT-15">
                                            <h5 class="mB-5">{{ DO }}</h5>
                                            <small class="fw-600 c-grey-700">Davao Oriental</small>
                                            <span class="pull-right c-grey-600 fsz-sm">{{ DOPercent + "%" }}</span>
                                            <div class="progress mT-10">
                                                <div class="
                                                    progress-bar
                                                    bgc-blue-500
                                                " role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100" :style="'width: '+DOPercent+'%'">
                                                    <span class="visually-hidden">90% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="
                                        peers
                                        pT-20
                                        mT-20
                                        bdT
                                        fxw-nw@lg+
                                        jc-sb
                                        ta-c
                                        gap-10
                                    ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-4">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Site Data</h6>
                    </div>
                    <some-chart :chartData="someData"></some-chart>
                </div>
            </div>
        </div> -->
    </div>
</template>
<style scoped>
    .spinner-center {
        position: relative;
        margin: auto;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
</style>

<script>
import TotalUser from "../Pages/Charts/TotalUsers"
import SomeChart from "../Pages/Charts/SomeChart"
import LineChart from "../Pages/Charts/LineChart"
import PieChart from "../Pages/Charts/PieChart"
import Icon from '@/Shared/Icon'

export default {
    components: { TotalUser, SomeChart, LineChart, PieChart, Icon, },
    props: {
        participants: Object,
        day1: Object,
        day2: Object,
        day3: Object,
        DDO: Object,
        DDOPercent: Object,
        DDN: Object,
        DDNPercent: Object,
        DDSO: Object,
        DDSOPercent: Object,
        Davao: Object,
        DavaoPercent: Object,
        DO: Object,
        DOPercent: Object,
    },
    data() {
        return {
            totalUser: [this.DDO, this.DDN, this.DDSO, this.Davao, this.DO],
            someData: [this.DDO, this.DDN, this.DDSO, this.Davao, this.DO]
        }
    }
};
</script>
