export const AccountMixin = {
    data() {
        return {
            editMode: '',
            loading: '',
            accounts: '',
            query: '',
            pagination: {
                current_page: 1,
            },
            form: new Form({
                id: '',
                account_name: '',
                address: '',
                balance: '',
                note: '',
                account_author_number: '',
                account_author_email: '',
            }),
            show_url: '',
        }
    },

    created() {
        this.getAccount();
    },

    methods: {
        close() {
            $('#accountModal').modal('hide');
        },
        getAccount() {
            this.$Progress.start()
            axios
                .get('/get-accounts?page=' + this.pagination.current_page)
                .then(res => {
                    this.loading = false;
                    this.accounts = res.data.data;
                    this.pagination = res.data;
                    this.$Progress.finish();
                })
        },
        create() {
            console.log('yes');
            this.form.reset();
            this.form.clear()
            $('#accountModal').modal('show');
        },
        show(id) {
            window.location.href = '/accounts/' + id;
        },
        store() {
            this.$Progress.start();
            this.form.busy = true;
            this.form.post('/accounts')
                .then(response => {
                    this.getAccount();
                    $('#accountModal').modal('hide');
                    if (this.form.successful) {
                        this.$Progress.finish();
                        this.$snotify.success('successfully saved');
                    } else {
                        this.$Progress.fail();
                        this.$snotify.error('something wrong');
                    }
                }).catch(e => {

                this.$Progress.fail();
                console.log('catch:baler code',e);
            })
        },
        edit(account) {
            this.editMode = true;
            this.form.reset();
            this.form.clear()
            this.form.fill(account);
            $('#accountModal').modal('show');
        },
        update() {
            this.$Progress.start();
            this.form.busy = true;
            this.form.put('/accounts/' + this.form.id)
                .then(response => {
                    this.getAccount();
                    $('#accountModal').modal('hide');
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
        destroy(customer) {
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
                                    .delete("/accounts/" + customer.id)
                                    .then(response => {
                                        this.getAccount();
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
                    "/search/account/" +
                    this.query +
                    "?page=" +
                    this.pagination.current_page
                )
                .then(response => {
                    this.accounts = response.data.data;
                    this.pagination = response.data;
                    this.$Progress.finish();
                })
                .catch(e => {
                    console.log(e);
                    this.$Progress.fail();
                });
        }
    },
    watch: {
        query: function (newQ, old) {
            if (newQ === "") {
                this.getAccount();
            } else {
                this.searchData();
            }
        }
    },
}
