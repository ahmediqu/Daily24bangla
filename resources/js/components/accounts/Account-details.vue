<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Account & Transaction </h4>
                <h6>Account Name: {{ accounts_transactions.account_name }} </h6>
                <h6>Account No: {{ accounts_transactions.account_no }} </h6>
                <h5>Current Balance: {{ accounts_transactions.balance }} </h5>

                <dropdown-component class="dropdown">
                    <template v-slot:trigger>
                        <a href="#" class="btn btn-primary">Download Reports</a>
                    </template>
                    <li><a class="dropdown-item" href="#" @click="itemAll(0, accounts_transactions.id)">All</a></li>
                    <li><a class="dropdown-item" href="#" @click="itemAll(1, accounts_transactions.id)">Week</a></li>
                    <li><a class="dropdown-item" href="#" @click="itemAll(2, accounts_transactions.id)">Month</a></li>
                    <li><a class="dropdown-item" href="#" @click="itemAll(3, accounts_transactions.id)">6 Month</a></li>
                    <li><a class="dropdown-item" href="#" @click="itemAll(4, accounts_transactions.id)">Year</a></li>
                </dropdown-component>
                <br>

                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-primary table-dark">
                            <tr>
                                <td>Sl.</td>
                                <td>Transaction( Tk )</td>
                                <td>Debit</td>
                                <td>Credit</td>
                                <td>Note</td>
                                <td>Date</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(transaction, index) in accounts_transactions.transactions">
                                <td> {{ index + 1 }}</td>
                                <td> {{ transaction.transactions }}</td>
                                <td>
                                    <span v-if="transaction.transactions_type === 'debit'">
                                        {{ transaction.transactions_type }}
                                    </span>
                                    <span v-else> - </span>
                                </td>
                                <td>
                                    <span v-if="transaction.transactions_type === 'credit'">
                                        {{ transaction.transactions_type }}
                                    </span>
                                    <span v-else> - </span>
                                </td>
                                <td>{{ transaction.transactions_note }}</td>
                                <td>{{ transaction.created_at | moment("DD, MMMM, Y") }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Account-details",
    props: {
        id: '',
    },
    data() {
        return {
            accounts_transactions: '',
        }
    },
    created() {
        console.log(this.id);
        this.getAccountsTransactions();
    },
    methods: {
        getAccountsTransactions() {
            axios.get('/account/' + this.id)
                .then(res => {
                    this.accounts_transactions = res.data;
                    console.log(res.data);
                })
        },
        itemAll(id, account_id) {

            axios({
                url: '/download-transaction/' + id +'/'+account_id,
                method: 'GET',
                responseType: 'blob', // important
            }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'file.pdf');
                document.body.appendChild(link);
                link.click();
            });
        },
    }
}
</script>

<style scoped>

</style>
