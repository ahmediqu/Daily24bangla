<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3 clearfix">Client Lists
                            <button type="button" @click="create" class="float-right btn btn-success btn-lg">Create new
                                client
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
                                    <td>Balance</td>
                                    <td>Contact</td>
                                    <td>Address</td>
                                    <td>Links</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(account, index) in accounts" :key="index">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ account.account_name }}</td>
                                    <td>{{ account.balance }}</td>
                                    <td >
                                        {{ account.account_author_number }} <br>
                                        {{ account.account_author_email }}
                                    </td>
                                    <td> {{ account.address }} </td>
                                    <td>
                                        <button
                                            class="btn btn-outline-info  mb-2 btn-sm"
                                            type="button"
                                            @click="show(account.id)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="btn btn-outline-info  mb-2 btn-sm"
                                            type="button"
                                            @click="edit(account)">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-outline-danger mb-2 btn-sm"
                                            type="button" @click="destroy(account)">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <pagination-component
                                v-if="pagination.last_page > 1"
                                :pagination="pagination"
                                :offset="4"
                                @paginate="getAccount"
                            ></pagination-component>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="accountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            {{ editMode ? 'Edit' : 'Add' }} Client
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
                                <label>Client Name *</label>
                                <input
                                    v-model="form.account_name"
                                    type="text"
                                    name="account_name"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('account_name') }"
                                >
                                <has-error :form="form" field="account_name"></has-error>
                            </div>

                            <div class="mb-3">
                                <label>Client Address</label>
                                <input
                                    v-model="form.address"
                                    type="text"
                                    name="account_no"
                                    class="form-control"
                                >
                            </div>

                            <div class="mb-3">
                                <label>Initial Balance *</label>
                                <input
                                    v-model="form.balance"
                                    type="number"
                                    name="balance"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('balance') }"
                                >
                                <has-error :form="form" field="account_no"></has-error>
                            </div>

                            <div class="md-3">
                                <label for="">Account Holder Phone number and Email</label>
                                <div class="input-group">
                                    <input
                                        v-model="form.account_author_number"
                                        type="number"
                                        aria-label="First name"
                                        class="form-control"
                                        placeholder="Phone number">

                                    <input
                                        v-model="form.account_author_email"
                                        type="email"
                                        aria-label="Last name"
                                        class="form-control"
                                        placeholder="Email">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="">Node/Details</label>
                                <textarea
                                    v-model="form.note"
                                    name="note"
                                    class="form-control"
                                    id="" cols="30" rows="10">

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
import { AccountMixin } from "../../mixins/AccountMixin";

export default {
    name: "Lists",
    mixins: [AccountMixin],
}
</script>

<style scoped>

</style>
