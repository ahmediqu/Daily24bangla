<template>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">

                <li class="page-item" v-for="(pages, index) in numberOfPages" :key="index">
                    <a class="page-link" href="baseUrl+index">{{ index}}</a>
                </li>

            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: "Pagenation",
    props: {
        numberOfPages: {
            required: true
        },
        baseUrl:{
            required: true
        }
    }
}
</script>

<style scoped>

</style>
