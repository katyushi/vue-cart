<template>
    <div class="container">
        <nav class="bg-white px-8 pt-2 shadow-md">
            <div class="-mb-px flex justify-center">
                <router-link
                    to="/"
                    class="no-underline text-teal-dark border-b-2 border-teal-dark uppercase tracking-wide font-bold text-xs py-3 mr-8"
                    >Home</router-link
                >
                <router-link
                    to="/products"
                    class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3 mr-8"
                    >Products</router-link
                >
                <router-link
                    to="/cart"
                    class="no-underline text-grey-dark border-b-2 border-transparent uppercase tracking-wide font-bold text-xs py-3 mr-8"
                    >Cart</router-link
                >
            </div>
        </nav>
        <br />
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-active {
    opacity: 0;
}
</style>

<script>
export default {};
</script>
