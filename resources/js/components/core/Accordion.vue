<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <accordion-item
                        v-for="(item,index) in items"
                        :item="item"
                        :key="index"
                        @toggled="onToggle"
                        :is-open="activeItemIndex == index"
                    >

                    </accordion-item>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Accordion",
    props: {
        items: ''
    },
    data() {
        return {
            activeItemIndex: null,
        }
    },
    methods:{
        onToggle(index) {
            if(this.activeItemIndex==index) {
                return this.activeItemIndex=null;
            }
            this.activeItemIndex = index
        }
    }
}
</script>
