import "./bootstrap";
import "./loading";
import "./swal-confirm";
import "flowbite";
import $ from "jquery";
import Alpine from "alpinejs";
import Swal from "sweetalert2";
import Aos from "aos";
import ApexCharts from "apexcharts";

window.Alpine = Alpine;
window.ApexCharts = ApexCharts;
window.Swal = Swal;
window.$ = $;

Alpine.start();
Aos.init();
