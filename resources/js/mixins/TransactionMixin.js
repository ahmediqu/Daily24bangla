export const TransactionMixin = {
    data() {
        return {
            editMode: '',
            loading: '',
            transactions: '',
            accounts: [],
            query: '',
            pagination: {
                current_page: 1,
            },
            form: new Form({
                id: '',
                account_id: '',
                transactions_type: '',
                transactions: '',
                transactions_note: '',
            }),
        }
    },

    mounted() {
        axios.get('get-all-accounts')
            .then(response => {
                this.accounts = response.data;
            });
    },
    created() {

        this.getTransaction();
    },

    methods: {
        close() {
            $('#transactionModal').modal('hide');
        },
        getTransaction() {
            this.$Progress.start()
            axios
                .get('/get-transactions?page=' + this.pagination.current_page)
                .then(res => {
                    this.loading = false;
                    this.transactions = res.data.data;
                    this.pagination = res.data;
                    this.$Progress.finish();
                })
        },
        create() {
            this.form.reset();
            this.form.clear()
            $('#transactionModal').modal('show');
        },
        store() {
            this.$Progress.start();
            this.form.busy = true;
            this.form.post('/transactions')
                .then(response => {
                    this.getTransaction();
                    $('#transactionModal').modal('hide');
                    if (this.form.successful) {
                        this.$Progress.finish();
                        this.$snotify.success('successfully saved');
                    } else {
                        this.$Progress.fail();
                        this.$snotify.error('something wrong');
                    }
                }).catch(e => {
                this.$Progress.fail();
                console.log(e);
            })
        },
        edit(transaction) {
            this.editMode = true;
            this.form.reset();
            this.form.clear()
            this.form.fill(transaction);
            $('#transactionModal').modal('show');
        },
        update() {
            this.$Progress.start();
            this.form.busy = true;
            this.form.put('/transactions/' + this.form.id)
                .then(response => {
                    this.getTransaction();
                    $('#transactionModal').modal('hide');
                    if (this.form.successful) {
                        this.$Progress.finish();
                        this.$snotify.success('successfully updated');
                    } else {
                        this.$Progress.fail();
                        this.$snotify.error('something wrong');
                    }
                }).catch(e => {
                this.$Progress.fail();
                console.log(e);
            })
        },
        destroy(transaction) {
            this.$snotify.clear();
            this.$snotify.confirm(
                "You will not be able to recover this data!",
                "Are you sure?",
                {
                    showProgressBar: false,
                    closeOnClick: false,
                    pauseOnHover: true,
                    buttons: [
                        {
                            text: "Yes",
                            action: toast => {
                                this.$snotify.remove(toast.id);
                                this.$Progress.start();
                                axios
                                    .delete("/transactions/" + transaction.id)
                                    .then(response => {
                                        this.getTransaction();
                                        this.$Progress.finish();
                                        this.$snotify.success(
                                            "Customer Successfully Deleted",
                                            "Success"
                                        );
                                    })
                                    .catch(e => {
                                        this.$Progress.fail();
                                        console.log(e);
                                    });
                            },
                            bold: true
                        },
                        {
                            text: "No",
                            action: toast => {
                                this.$snotify.remove(toast.id);
                            },
                            bold: true
                        }
                    ]
                }
            );
        },
        searchData() {
            this.$Progress.start();
            axios
                .get(
                    "/search/transaction/" +
                    this.query +
                    "?page=" +
                    this.pagination.current_page
                )
                .then(response => {
                    this.transactions = response.data.data;
                    this.pagination = response.data;
                    this.$Progress.finish();
                })
                .catch(e => {
                    console.log(e);
                    this.$Progress.fail();
                });
        },
        download() {

            axios({
                url: '/transaction/download',
                method: 'GET',
                responseType: 'blob', // important
            }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'transactions.pdf');
                document.body.appendChild(link);
                link.click();
            });
        }
    },
    watch: {
        query: function (newQ, old) {
            if (newQ === "") {
                this.getTransaction();
            } else {
                this.searchData();
            }
        }
    },
}
