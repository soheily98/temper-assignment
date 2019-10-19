<template>
  <div>
    <HighCharts :options="chartOptions"></HighCharts>
  </div>
</template>

<script>
import {Chart} from 'highcharts-vue'

export default {
  name: 'Panel',
  components: {
    HighCharts: Chart
  },
  props: {
    msg: String
  },
  data() {
    return {
      chartOptions: {
        title: {
          text: 'Weekly retention'
        }
      }
    }
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    fetchData: function() {
      this.axios.get('api/v1/charts/weekly-retention').then((response) => {
        this.chartOptions = response.data.data.options
      })
    }
  }
}
</script>