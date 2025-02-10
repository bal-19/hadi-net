import "./bootstrap";
import "./loading";
import "./swal-confirm";
import "flowbite";
import Alpine from "alpinejs";
import Chart from "chart.js/auto";
import Swal from "sweetalert2";
import Aos from "aos";

window.Alpine = Alpine;
window.Chart = Chart;
window.Swal = Swal;

Alpine.start();
Aos.init();
