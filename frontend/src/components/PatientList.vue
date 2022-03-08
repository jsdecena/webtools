<template>
  <section id="patient-list" class="container">
    <h1 class="text-left">Patient List</h1>
    <p v-if="isLoading" class="alert alert-info">Loading ...</p>
    <table class="table table-sm text-left" v-if="patients.data && !isViewing && !isLoading">
      <thead>
        <tr class="thead-dark">
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Birthdate</th>
          <th>Gender</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="patient in patients.data" :key="patient.id">
          <td>{{patient.id}}</td>
          <td>{{patient.first_name}}</td>
          <td>{{patient.last_name}}</td>
          <td>{{patient.birth_date}}</td>
          <td>{{patient.gender}}</td>
          <td><button class="btn btn-sm btn-primary" type="button" @click="viewPatient(patient.id)">View</button></td>
        </tr>
      </tbody>
    </table>
    <table class="table table-sm" v-if="isViewing && !isLoading">
      <thead>
      <tr class="thead-dark">
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birthdate</th>
        <th>Gender</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>{{patient.id}}</td>
        <td>{{patient.first_name}}</td>
        <td>{{patient.last_name}}</td>
        <td>{{patient.birth_date}}</td>
        <td>{{patient.gender}}</td>
        <td><button class="btn btn-sm btn-primary" type="button" @click="back">Back</button></td>
      </tr>
      </tbody>
    </table>
  </section>
</template>

<script>
export default {
  name: 'PatientList',
  data() {
    return {
      patients: [],
      patient: {
        first_name: '',
        last_name: '',
        birth_date: '',
        gender: '',
      },
      isViewing: false,
      isLoading: false,
    }
  },
  created() {
    this.listPatients()
  },
  methods: {
    back() {
      this.isViewing = false
      this.isLoading = false
      this.listPatients()
    },
    listPatients() {
      this.isLoading = true
      fetch(process.env.VUE_APP_HOST + '/api/patients')
          .then(response => response.json())
          .then(data => {
            this.isLoading = false
            this.patients = data
          });

    },
    viewPatient(id) {
      this.isLoading = true
      fetch(process.env.VUE_APP_HOST + '/api/patients/' + id)
          .then(response => response.json())
          .then(res => {
            this.isViewing = true
            this.isLoading = false
            this.patient = res.data
          });

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  @import "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css";
</style>
