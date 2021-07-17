<template>
  <vuexy-layout>
    <!-- Modal Themes start -->
    <section id="modal-themes">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Modal Themes</h4>
            </div>
            <div class="card-body">
              <p class="card-text mb-0">
                Use class <code>.modal-{color}</code> with your
                <code>.modal</code> to change theme of modal
              </p>
              <div class="demo-inline-spacing">
                <div class="d-inline-block">
                  <!-- Button trigger modal -->
                  <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-toggle="modal"
                    data-target="#primary"
                  >
                    Create new customer
                  </button>
                  <!-- Modal -->
                  <div
                    class="modal fade text-left modal-primary"
                    id="primary"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="myModalLabel160"
                    aria-hidden="true"
                  >
                    <div
                      class="modal-dialog modal-dialog-centered modal-lg"
                      role="document"
                    >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel160">
                            Create Customer
                          </h5>
                          <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                          >
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Name</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="form.name"
                            />
                            <jet-input-error :message="form.errors.name" />
                          </div>
                          <div class="form-group">
                            <label>Phone</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="form.phone_no"
                            />
                            <jet-input-error :message="form.errors.phone_no" />
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button
                            type="button"
                            class="btn btn-primary"
                            @click="submitForm"
                          >
                            Accept
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal Themes end -->
  </vuexy-layout>
</template>

<script>
import VuexyLayout from "@/Layouts/VuexyLayout";
import JetInputError from "@/Jetstream/InputError";

export default {
  components: {
    VuexyLayout,
    JetInputError,
  },
  data() {
    return {
      form: this.$inertia.form({
        _method: "POST",
        name: "",
        phone_no: "",
      }),
    };
  },
  methods: {
    submitForm: async function () {
      this.form.post(route("customer.create"), {
        errorBag: "CreateCustomer",
        preserveScroll: true,
        onSuccess: () => alert("customer saved!"),
        onError: () => alert("error"),
        onFinish: () => this.form.reset(),
      });
    },
  },
};
</script>
