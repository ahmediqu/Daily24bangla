<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3 clearfix">Transaction Lists

                            <button type="button" @click="download" class="float-right btn btn-success btn-lg ml-3">
                                Download all transactions
                            </button>
                            <button type="button" @click="create" class="float-right btn btn-success btn-lg">Add new
                                transaction
                            </button>
                        </h4>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <input
                                    v-model="query"
                                    type="text"
                                    class="form-control"
                                    placeholder="Account No / Account name"
                                    aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button
                                    class="btn btn-outline-secondary"
                                    type="button"
                                    id="button-addon2"
                                    @click="searchData">

                                    search
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                <tr>
                                    <td>Sl.</td>
                                    <td>Client Name</td>
                                    <td>Balance Type</td>
                                    <td>Actions</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(transaction, index) in transactions" :key="index">
                                    <td> {{ index + 1 }}</td>
                                    <td> {{ transaction.account.account_name }}</td>
                                    <td>
                                        <span class="badge bg-success "
                                              v-if="transaction.transactions_type === 'debit'">{{ transaction.transactions_type }}</span>
                                        <span class="badge bg-danger"
                                              v-else>{{ transaction.transactions_type }}</span>
                                        {{ transaction.transactions }}
                                    </td>
                                    <td>
                                        <button
                                            class="btn btn-outline-info  mb-2"
                                            type="button"
                                            @click="edit(transaction)">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-outline-danger mb-2"
                                            type="button" @click="destroy(transaction)">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="transactionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            {{ editMode ? 'Edit' : 'Add' }} Accounts
                        </h5>
                        <button
                            type="button"
                            class="btn btn-outline-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            @click="close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <p class="mb-3 text-danger">The field labels marked with * are required input fields.</p>
                            <alert-error :form="form"></alert-error>

                            <div class="mb-3">
                                <v-select
                                    :options="accounts"
                                    :reduce="accounts => accounts.id"
                                    v-model="form.account_id"
                                    label="account_name"
                                    name="account_id"
                                    :class="{ 'is-invalid': form.errors.has('account_id') }">
                                </v-select>
                                <has-error :form="form" field="account_id"></has-error>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input
                                        v-model="form.transactions_type"
                                        class="form-check-input"
                                        type="radio"
                                        value="debit"
                                        name="transactions_type"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Debit
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        v-model="form.transactions_type"
                                        class="form-check-input"
                                        type="radio"
                                        value="credit"
                                        name="transactions_type"
                                        id="flexRadioDefault2"
                                        checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Credit
                                    </label>
                                </div>
                                <has-error :form="form" field="transactions_type"></has-error>
                            </div>

                            <div class="mb-3">
                                <label>Balance *</label>
                                <input
                                    v-model="form.transactions"
                                    type="number"
                                    name="transactions"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('transactions') }"
                                >
                                <has-error :form="form" field="transactions"></has-error>
                            </div>

                            <div class="mb-3">
                                <label for="">Node/Details</label>
                                <textarea
                                    v-model="form.transactions_note"
                                    name="note"
                                    class="form-control"
                                    id="" cols="3" rows="3">
                                </textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                                @click="close">
                                Close
                            </button>
                            <button :disabled="form.busy" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <vue-progress-bar></vue-progress-bar>
        <vue-snotify></vue-snotify>
    </div>
</template>

<script>
import {TransactionMixin} from "../../mixins/TransactionMixin";

export default {
    name: "Lists",
    mixins: [TransactionMixin],
}
</script>

<style scoped>

</style>
