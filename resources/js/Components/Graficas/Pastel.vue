<script setup lang="ts">
import { ref } from 'vue';
import { Pie } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement, CategoryScale } from 'chart.js';

// Registra los componentes de Chart.js

interface DataItem {
  label: string;
  value: number;
  color: string;
}

const props = defineProps<{
  data: DataItem[];
  labelGraph: string;
}>();

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale);

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
    <div>
      <Pie :data="chartData" :chartOptions="chartOptions" />
    </div>
</template>