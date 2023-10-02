<template>
    <div class="sidebar">
        <div class="sidebar-inner">
            <!-- ### $Sidebar Header ### -->
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="index.html"
                            ><div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo">
                                        <img
                                            src="/images/logo.png"
                                            alt=""
                                            class="img-fluid p-5"
                                        />
                                    </div>
                                </div>
                                <div class="peer peer-greed">
                                    <h5 class="lh-1 mB-0 logo-text">
                                        Admin
                                    </h5>
                                </div>
                            </div></a
                        >
                    </div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle">
                            <a href="" class="td-n"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-list" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ### $Sidebar Menu ### -->
            <ul class="sidebar-menu scrollable pos-r">
                <li class="nav-item mT-30 actived">
                    <Link class="sidebar-link" href="/"
                        ><span class="icon-holder"
                            >
                            <icon name="dashboard"></icon>
                        </span
                        ><span class="title">Dashboard</span></Link
                    >
                </li>
                <li class="nav-item">
                        <Link class="sidebar-link" href="/participants"
                            ><span class="icon-holder"
                                >
                                <icon name="users"></icon>
                            </span
                            ><span class="title">Participants</span></Link
                        >
                    </li>


                <li class="nav-item">
                    <Link class="sidebar-link" href="/users"
                        ><span class="icon-holder"
                            >
                            <icon name="users"></icon>
                        </span
                        ><span class="title">Users</span></Link
                    >
                </li>
                <li class="nav-item">
                    <Link class="sidebar-link" href="/posts"
                        ><span class="icon-holder"
                            >
                            <icon name="posts"></icon>
                        </span
                        ><span class="title">Posts</span></Link
                    >
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);"
                        ><span class="icon-holder"
                            ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                              <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                            </svg></span
                        ><span class="title">Tables</span>
                        <span class="arrow"
                            >
                            <icon name="table"></icon>
                            </span
                    ></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="sidebar-link" href="basic-table.html"
                                >Basic Table</a
                            >
                        </li>
                        <li>
                            <a class="sidebar-link" href="datatable.html"
                                >Data Table</a
                            >
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
    components: {
        Icon,
    },
    mounted() {
        $(function () {
            $(".sidebar .sidebar-menu li a").on("click", function () {
                const $this = $(this);

                if ($this.parent().hasClass("open")) {
                    $this
                        .parent()
                        .children(".dropdown-menu")
                        .slideUp(200, () => {
                            $this.parent().removeClass("open");
                        });
                } else {
                    $this
                        .parent()
                        .parent()
                        .children("li.open")
                        .children(".dropdown-menu")
                        .slideUp(200);

                    $this
                        .parent()
                        .parent()
                        .children("li.open")
                        .children("a")
                        .removeClass("open");

                    $this
                        .parent()
                        .parent()
                        .children("li.open")
                        .removeClass("open");

                    $this
                        .parent()
                        .children(".dropdown-menu")
                        .slideDown(200, () => {
                            $this.parent().addClass("open");
                        });
                }
            });

            // Sidebar Activity Class
            const sidebarLinks = $(".sidebar").find(".sidebar-link");

            sidebarLinks
                .each((index, el) => {
                    $(el).removeClass("active");
                })
                .filter(function () {
                    const href = $(this).attr("href");
                    const pattern = href[0] === "/" ? href.substr(1) : href;
                    return pattern === window.location.pathname.substr(1);
                })
                .addClass("active");

            // ٍSidebar Toggle
            $(".sidebar-toggle").on("click", (e) => {
                $("body").toggleClass("is-collapsed");
                e.preventDefault();
            });

        });
    }
}
</script>
