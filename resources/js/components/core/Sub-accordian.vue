<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <sub-accordion-item
                        v-for="(item,index) in items"
                        :item="item"
                        :key="index"
                        @toggledd="onToggleee"
                        :is-open="activeItemIndex == index"
                    >

                    </sub-accordion-item>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Sub-accordian",
    props: {
        items: ''
    },
    data() {
        return {
            activeItemIndex: null,
        }
    },
    methods:{
        onToggleee(index) {
            if(this.activeItemIndex==index) {
                return this.activeItemIndex=null;
            }
            this.activeItemIndex = index
        }
    }
}
</script>
