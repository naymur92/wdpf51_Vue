<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h1 class="text-center">Form Bindings</h1>
          </div>
          <form @submit.prevent="submitForm()">
            <div class="card-body">
              <div class="form-group">
                <label for="_name"><strong>Name:</strong></label>
                <input
                  type="text"
                  v-model.trim="formValues.name"
                  id="_name"
                  placeholder="Enter Name"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="_email"><strong>Email:</strong></label>
                <input
                  type="email"
                  v-model.trim="formValues.email"
                  id="_email"
                  placeholder="Enter Email"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="_district"><strong>District:</strong></label>
                <select
                  v-model="formValues.district"
                  id="_district"
                  class="form-control"
                >
                  <option value="" disabled selected>Select One</option>
                  <option value="chuadanga">Chuadanga</option>
                  <option value="dhaka">Dhaka</option>
                  <option value="kushtia">Kushtia</option>
                </select>
              </div>
              <div class="form-group">
                <strong>Gender: </strong>

                <input
                  type="radio"
                  name="gender"
                  value="male"
                  v-model="formValues.gender"
                />
                <label for="_g_male"><strong>Male</strong></label>
                &nbsp; &nbsp;

                <input
                  type="radio"
                  name="gender"
                  value="female"
                  v-model="formValues.gender"
                />
                <label for="_g_female"><strong>Female</strong></label>
              </div>
              <div class="form-group">
                <label for="_education"><strong>District:</strong></label>
                <select
                  v-model="formValues.education"
                  id="_education"
                  multiple
                  class="form-control"
                >
                  <option value="ssc">SSC</option>
                  <option value="hsc">HSC</option>
                  <option value="bsc">BSc</option>
                  <option value="msc">MSc</option>
                </select>
              </div>
              <div class="form-group">
                <label><strong>Courses:</strong></label>
                <br />
                <input
                  type="checkbox"
                  v-model="formValues.courses"
                  value="Python"
                />
                Python <br />
                <input
                  type="checkbox"
                  v-model="formValues.courses"
                  value="Java"
                />
                Java <br />
                <input
                  type="checkbox"
                  v-model="formValues.courses"
                  value="PHP"
                />
                PHP <br />
              </div>
              <div class="form-group">
                <label for="_age"><strong>Age:</strong></label>
                <input
                  type="number"
                  id="_age"
                  v-model="formValues.age"
                  class="form-control"
                  placeholder="Enter Age"
                />
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
        <h3 class="mt-4">Submitted Data</h3>
        <pre>
          {{ JSON.stringify(output, NULL, 2) }}
        </pre>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formValues: {
        name: "",
        email: "",
        district: "",
        gender: "",
        education: [],
        courses: [],
        age: null,
      },
      output: {},
    };
  },
  methods: {
    submitForm() {
      this.output = this.formValues;
    },
  },
};
</script>

<style>
</style>