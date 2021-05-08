<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                  <h3>Other accordian</h3>
                    <multi-accordion :items="subQuestions">
                    </multi-accordion>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Accordion from "./Accordion";
export default {
    name: "Multi-accordion",
    components:{
        Accordion
    },
    data() {
        return {
            activeItemIndex: null,
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
        onToggle(index) {
            if(this.activeItemIndex==index) {
                return this.activeItemIndex=null;
            }
            this.activeItemIndex = index
        }
    }

}
</script>
