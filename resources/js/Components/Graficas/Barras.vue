<script setup lang="ts">
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
import { plugin } from 'postcss';

interface DataItem {
  label: string;
  value: number;
  color: string;
}

const props = defineProps<{
  data: DataItem[];
  labelGraph: string;
}>();
// console.log(props.data);
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

// Espera algo cómo esto
/*
const props = {
  data: [
    { label: 'Enero', value: 50, color: '#FF5733' },
    { label: 'Febrero', value: 75, color: '#33FF57' },
    { label: 'Marzo', value: 100, color: '#3357FF' }
  ]
};
*/

const chartData = {
  labels: props.data.map(item => item.label),
  datasets: [
    {
        //  label: props.labelGraph,
      data: props.data.map(item => item.value),
      backgroundColor: props.data.map(item => item.color),
    }
  ]
};

const chartOptions = {
  responsive: true,
  plugins: {
    title: {
      display: true,
      text: props.labelGraph,
      color: "#000000",
        padding:{
            bottom: 20
        },
        font: {
            size: 20
        }
    },
    legend: {
      display: false,
      labels: {
        color: 'green',
      },
    }
  },
};
</script>

<template>
  <Bar
    id="my-chart-id"
    :options="chartOptions"
    :data="chartData"
  />
</template>
