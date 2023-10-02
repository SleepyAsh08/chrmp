<template>
</template>

<script>
import { defineComponent, h, PropType } from 'vue'

import { Bar } from 'vue-chartjs'

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
    Plugin
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default defineComponent({
    name: 'BarChart',
    components: {
        Bar
    },
    props: {
        chartId: {
            type: String,
            default: 'bar-chart'
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
        var vm = this

        const chartData = {
            labels: [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
            datasets: [
                {
                    label: 'Data One',
                    backgroundColor: ['#329719', '#433979', '#544979', '#855979', '#966979', '#177979', '#f87327', '#f81279', '#f87979', '#f86979', '#f11979', '#f89979'],
                    data: props.chartData
                }
            ]
        }

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                yAxis: {
                    min: 0, // minimum value
                    max: 100 // maximum value
                }
            }
        }

        return () =>
            h(Bar, {
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