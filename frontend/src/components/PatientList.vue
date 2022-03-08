<template>
  <section id="patient-list" class="container">
    <p v-if="!patients.data" class="alert alert-info">Loading ...</p>
    <table class="table table-sm" v-if="patients.data">
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
        <td><button class="btn btn-sm btn-primary" type="button">View</button></td>
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
      patients: []
    }
  },
  created() {
    this.listPatients()
  },
  methods: {
    listPatients() {
      fetch(process.env.VUE_APP_HOST + '/api/patients')
          .then(response => response.json())
          .then(data => this.patients = data);

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  @import "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css";
</style>
