<template>
    <div>
        <div>
            <button class="btn btn-info" @click="toggle">
                <div v-if="isOpen">
                    close
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div v-else>
                    <span>open</span>
                </div>
            </button>
        </div>
        <div>
            <h3 v-text="item.title" @click="toggle"></h3>
            <div v-show="isOpen">
                {{ item.body }}

                <sub-accordion :items="subQuestions" />

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Accordion-item",
    props: {
        item: '',
        isOpen:'',
    },
    data() {
        return {
            subQuestions: [
                {
                    title: 'Sub First One',
                    body: ' SubFirst ONe body'
                },
                {
                    title: 'Sub Second One',
                    body: 'Sub Second ONe body'
                },
                {
                    title: 'Sub Third One',
                    body: 'Sub Third ONe body'
                }
            ],
        }
    },
    methods:{
        toggle() {
            this.$emit('toggled', this.$vnode.key);
        }
    }
}
</script>

<style scoped>

</style>
