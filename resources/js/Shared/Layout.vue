<template>
    <div>
        <Sidebar></Sidebar>
        <div class="page-container">
            
            <Notification></Notification>

            <Nav></Nav>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <slot></slot>
                </div>
            </main>

            <Footer></Footer>
        </div>
    </div>
</template>
<script>
import Nav from "@/Shared/Nav";
import Footer from "@/Shared/Footer";
import Sidebar from "@/Shared/Sidebar.vue";

export default {
    components: {
        Nav,
        Footer,
        Sidebar,
    },
    mounted() {
        // this will trigger all tooltips inside the layout only
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    },
};
</script>