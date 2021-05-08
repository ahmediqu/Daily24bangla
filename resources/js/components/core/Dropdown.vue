<template>
    <div class="dropdown">
        <div class="dropdown-trigger" @click.prevent="isOpen = !isOpen">
            <slot name="trigger"></slot>
        </div>
        <ul v-show="isOpen" class="dropdown-menu" :class="classes">
            <slot></slot>
        </ul>
    </div>
</template>
<script>
export default {
    name:'Dropdown',
    props: {
        classes:{}
    },
    data() {
        return {
            isOpen: false
        }
    },
    watch: {
        isOpen(isOpen) {
            if(isOpen) {
                document.addEventListener('click', this.closeIfClickOutsite);
            }
        }
    },
    methods: {
        closeIfClickOutsite(event) {
            if(!event.target.closest('.dropdown')) {
                this.isOpen = false
            }
        }
    }
}
</script>
<style scoped>
.dropdown-menu {
    display: block;
}
</style>
