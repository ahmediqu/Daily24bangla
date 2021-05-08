<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Reports</h4>
                        <form @submit.prevent="reportFilter">
                            <div class="row no-gutter justify-content-center">

                                <div class="col-md-3">
                                    <label>Account Name</label>
                                    <select v-model="form.account_name" class="form-control">
                                        <option value="" selected>Select Account name</option>
                                        <option value="" v-for="(account, index) in accounts" :key="index">
                                            {{ account.account_name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Transaction Type</label>
                                    <select v-model="form.transaction_type" class="form-control">
                                        <option value="" selected>Select transaction type</option>
                                        <option value="debit">Debit</option>
                                        <option value="credit">Credit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row no-gutter justify-content-center mt-3">
                                <div class="col-md-3">

                                    <label>Form Date Range</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label> To Date Range</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-lg btn-primary d-block form-control">Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AccountReport",
    data() {
        return {
            accounts: '',
            form: {
                account_no: '',
                account_name: '',
                transaction_type: '',
            },
            pagination: {
                current_page: 1,
            },
        }
    },
    created() {
        this.getAccount();
    },
    methods: {
        getAccount() {
            axios
                .get('/reports-accounts')
                .then(res => {
                    this.accounts = res.data;
                    this.pagination = res.data;
                })
        },
        reportFilter() {

        }
    },
}
</script>
