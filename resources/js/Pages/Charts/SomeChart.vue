<template>
</template>

<script>
import { defineComponent, h, PropType } from 'vue'

import { Doughnut } from 'vue-chartjs'

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    ArcElement,
    CategoryScale,
    Plugin
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)

export default defineComponent({
    name: 'DoughnutChart',
    components: {
        Doughnut
    },
    props: {
        chartId: {
            type: String,
            default: 'doughnut-chart'
        },
        width: {
            type: Number,
            default: 400
        },
        height: {
            type: Number,
            default: 400
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => { }
        },
        plugins: {
            type: Array,
            default: () => []
        },
        chartData: {
            type: Array,
            default: () => []
        }
    },
    setup(props) {
        const chartData = {
            labels: ['Davao de Oro', 'Davao del Norte', 'Davao del Sur/Occidental', 'Davao City', 'Davao Oriental'],
            datasets: [
                {
                    backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16', '#000000'],
                    data: props.chartData
                }
            ]
        }

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false
        }

        return () =>
            h(Doughnut, {
                chartData,
                chartOptions,
                chartId: props.chartId,
                width: props.width,
                height: props.height,
                cssClasses: props.cssClasses,
                styles: props.styles,
                plugins: props.plugins
            })
    }
})

</script>

<style>
</style>
