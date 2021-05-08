<template>
    <div>
        <div class="container">
            <h3 class="text-center"> Faq </h3>
            <div class="row">
                <div class="col-md-8">
                    <div>
                        <Accordion :items="questions">
                        </Accordion>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Accordion from "./Accordion";
export default {
    name: "Faq",
    components:{
        Accordion,
    },
    data() {
        return {
            questions: [
                {
                    title: 'First One',
                    body: 'First ONe body'
                },
                {
                    title: 'Second One',
                    body: 'Second ONe body'
                },
                {
                    title: 'Third One',
                    body: 'Third ONe body'
                },
            ],
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
    }
}
</script>

<style scoped>

</style>
