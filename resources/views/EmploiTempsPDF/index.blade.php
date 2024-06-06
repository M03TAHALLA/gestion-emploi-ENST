<style>
    body {
        margin-top: 2px;
        font-family: Arial, sans-serif; /* Ensure a web-safe font for consistency */
    }
    .schedule-table table {
        width: 100%;
        border-collapse: collapse; /* Ensure there are no gaps between table cells */
    }
    .schedule-table table thead tr {
        background: #8c969a;
    }
    .schedule-table table thead th {
        padding: 5px; /* Reduced padding to fit the content */
        color: #000000;
        text-align: center;
        font-size: 12px; /* Adjusted font size for better fit */
        font-weight: 800;
        position: relative;
        border: 1;
    }
    .schedule-table table thead th:before {
        content: "";
        width: 3px;
        height: 35px;
        background: rgba(255, 255, 255, 0.2);
        position: absolute;
        right: -1px;
        top: 50%;
        transform: translateY(-50%);
    }
    .schedule-table table thead th.last:before {
        content: none;
    }
    .schedule-table table tbody td {
        vertical-align: middle;
        border: 2px solid #000000;
        font-weight: 500;
        padding: 5px; /* Reduced padding to fit the content */
        text-align: center;
        font-size: 12px; /* Adjusted font size for better fit */
    }
    .schedule-table table tbody td.day {
        font-size: 14px;
        font-weight: 600;
        background: #f0f1f3;
        border: 2px solid #000000;
        position: relative;
        transition: all 0.3s linear 0s;
        min-width: 130px; /* Reduced minimum width */
    }
    .schedule-table table tbody td.active {
        position: relative;
        z-index: 10;
        transition: all 0.3s linear 0s;
        min-width: 130px; /* Reduced minimum width */
    }
    .schedule-table table tbody td.active h4 {
        font-weight: 700;
        color: #000;
        font-size: 14px;
        margin-bottom: 5px;
    }
    .schedule-table table tbody td.active p {
        font-size: 12px;
        line-height: normal;
        margin-bottom: 0;
    }
    .schedule-table table tbody td .hover h4 {
        font-weight: 700;
        font-size: 14px;
        color: #ffffff;
        margin-bottom: 5px;
    }
    .schedule-table table tbody td .hover p {
        font-size: 12px;
        margin-bottom: 5px;
        color: #ffffff;
        line-height: normal;
    }
    .schedule-table table tbody td .hover span {
        color: #ffffff;
        font-weight: 600;
        font-size: 12px;
    }
    .schedule-table table tbody td.active::before {
        position: absolute;
        content: "";
        min-width: 100%;
        min-height: 100%;
        transform: scale(0);
        top: 0;
        left: 0;
        z-index: -1;
        border-radius: 0.25rem;
        transition: all 0.3s linear 0s;
    }
    .schedule-table table tbody td .hover {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%) scale(0.8);
        z-index: 99;
        background: #86d4f5;
        border-radius: 0.25rem;
        padding: 5px 0;
        visibility: hidden;
        opacity: 0;
        transition: all 0.3s linear 0s;
    }
    .schedule-table table tbody td.active:hover .hover {
        transform: translate(-50%, -50%) scale(1);
        visibility: visible;
        opacity: 1;
    }
    .schedule-table table tbody td.day:hover {
        background: #86d4f5;
        color: #fff;
        border: 2px solid #000000;
    }
    @media screen and (max-width: 1199px) {
        .schedule-table {
            display: block;
            width: 100%;
            overflow-x: auto;
        }
        .schedule-table table thead th {
            padding: 10px 20px;
        }
        .schedule-table table tbody td {
            padding: 10px;
        }
        .schedule-table table tbody td.active h4 {
            font-size: 14px;
        }
        .schedule-table table tbody td.active p {
            font-size: 12px;
        }
        .schedule-table table tbody td.day {
            font-size: 16px;
        }
        .schedule-table table tbody td .hover {
            padding: 10px 0;
        }
        .schedule-table table tbody td .hover span {
            font-size: 14px;
        }
    }
    @media screen and (max-width: 991px) {
        .schedule-table table thead th {
            font-size: 14px;
            padding: 10px;
        }
        .schedule-table table tbody td.day {
            font-size: 16px;
        }
        .schedule-table table tbody td.active h4 {
            font-size: 14px;
        }
    }
    @media screen and (max-width: 767px) {
        .schedule-table table thead th {
            padding: 5px;
        }
        .schedule-table table tbody td {
            padding: 5px;
        }
        .schedule-table table tbody td.active h4 {
            font-size: 12px;
        }
        .schedule-table table tbody td.active p {
            font-size: 10px;
        }
        .schedule-table table tbody td .hover {
            padding: 5px 0;
        }
        .schedule-table table tbody td.day {
            font-size: 14px;
        }
        .schedule-table table tbody td .hover span {
            font-size: 12px;
        }
    }
    @media screen and (max-width: 575px) {
        .schedule-table table tbody td.day {
            min-width: 110px; /* Further reduced minimum width */
        }
    }
    /* Ensure table rows do not break across pages */
    tr {
        page-break-inside: avoid;
    }
</style>
<div class="container">
   <div class="w-95 w-md-75 w-lg-60 w-xl-55 mx-auto mb-6 text-center">
    <img style="width: 10%;margin-left:45%" src="images/ENStet.png" alt="">

<p style="text-align: center">ENS TETOUAN</p>

   </div>
   <div class="row">
       <div class="col-md-12">
           <div class="schedule-table">
               <table class="table bg-white">
                   <thead>
                       <tr>
                           <th>Routine</th>
                           <th>10 am</th>
                           <th>11 am</th>
                           <th>03 pm</th>
                           <th>05 pm</th>
                           <th class="last">07 pm</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td class="day">Sunday</td>
                           <td class="active">
                               <h4>Weight Loss</h4>
                               <p>10 am - 11 am</p>
                               <div class="hover">
                                   <h4>Weight Loss</h4>
                                   <p>10 am - 11 am</p>
                                   <span>Wayne Ponce</span>
                               </div>
                           </td>
                           <td></td>
                           <td class="active">
                               <h4>Yoga</h4>
                               <p>03 pm - 04 pm</p>
                               <div class="hover">
                                   <h4>Yoga</h4>
                                   <p>03 pm - 04 pm</p>
                                   <span>Francisco Watt</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Boxing</h4>
                               <p>05 pm - 06 pm</p>
                               <div class="hover">
                                   <h4>Boxing</h4>
                                   <p>05 pm - 06 pm</p>
                                   <span>Charles King</span>
                               </div>
                           </td>
                           <td></td>
                       </tr>
                       <tr>
                           <td class="day">Monday</td>
                           <td></td>
                           <td class="active">
                               <h4>Cardio</h4>
                               <p>11 am - 12 am</p>
                               <div class="hover">
                                   <h4>Cardio</h4>
                                   <p>11 am - 12 am</p>
                                   <span>David Warner</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Running</h4>
                               <p>03 pm - 04 pm</p>
                               <div class="hover">
                                   <h4>Running</h4>
                                   <p>03 pm - 04 pm</p>
                                   <span>Sophia Fuller</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Karate</h4>
                               <p>05 pm - 06 pm</p>
                               <div class="hover">
                                   <h4>Karate</h4>
                                   <p>05 pm - 06 pm</p>
                                   <span>Sophia Fuller</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Dance</h4>
                               <p>07 pm - 08 pm</p>
                               <div class="hover">
                                   <h4>Dance</h4>
                                   <p>07 pm - 08 pm</p>
                                   <span>Joey Jackson</span>
                               </div>
                           </td>
                       </tr>
                       <tr>
                           <td class="day">Tuesday</td>
                           <td class="active">
                               <h4>Dance</h4>
                               <p>10 am - 11 am</p>
                               <div class="hover">
                                   <h4>Dance</h4>
                                   <p>10 am - 11 am</p>
                                   <span>William Brown</span>
                               </div>
                           </td>
                           <td></td>
                           <td class="active">
                               <h4>Aerobics</h4>
                               <p>03 pm - 04 pm</p>
                               <div class="hover">
                                   <h4>Aerobics</h4>
                                   <p>03 pm - 04 pm</p>
                                   <span>Charles King</span>
                               </div>
                           </td>
                           <td></td>
                           <td class="active">
                               <h4>Boxing</h4>
                               <p>07 pm - 08 pm</p>
                               <div class="hover">
                                   <h4>Boxing</h4>
                                   <p>07 pm - 08 pm</p>
                                   <span>David Warner</span>
                               </div>
                           </td>
                       </tr>
                       <tr>
                           <td class="day">Wednesday</td>
                           <td class="active">
                               <h4>Fitness</h4>
                               <p>10 am - 11 am</p>
                               <div class="hover">
                                   <h4>Fitness</h4>
                                   <p>10 am - 11 am</p>
                                   <span>Wayne Ponce</span>
                               </div>
                           </td>
                           <td></td>
                           <td></td>
                           <td class="active">
                               <h4>Fitness</h4>
                               <p>05 pm - 06 pm</p>
                               <div class="hover">
                                   <h4>Fitness</h4>
                                   <p>05 pm - 06 pm</p>
                                   <span>Wayne Ponce</span>
                               </div>
                           </td>
                           <td></td>
                       </tr>
                       <tr>
                           <td class="day">Thursday</td>
                           <td></td>
                           <td class="active">
                               <h4>Cardio</h4>
                               <p>11 am - 12 am</p>
                               <div class="hover">
                                   <h4>Cardio</h4>
                                   <p>11 am - 12 am</p>
                                   <span>David Warner</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Running</h4>
                               <p>03 pm - 04 pm</p>
                               <div class="hover">
                                   <h4>Running</h4>
                                   <p>03 pm - 04 pm</p>
                                   <span>Sophia Fuller</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Karate</h4>
                               <p>05 pm - 06 pm</p>
                               <div class="hover">
                                   <h4>Karate</h4>
                                   <p>05 pm - 06 pm</p>
                                   <span>Sophia Fuller</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Dance</h4>
                               <p>07 pm - 08 pm</p>
                               <div class="hover">
                                   <h4>Dance</h4>
                                   <p>07 pm - 08 pm</p>
                                   <span>Joey Jackson</span>
                               </div>
                           </td>
                       </tr>
                       <tr>
                           <td class="day">Friday</td>
                           <td class="active">
                               <h4>Fitness</h4>
                               <p>10 am - 11 am</p>
                               <div class="hover">
                                   <h4>Fitness</h4>
                                   <p>10 am - 11 am</p>
                                   <span>Wayne Ponce</span>
                               </div>
                           </td>
                           <td></td>
                           <td></td>
                           <td class="active">
                               <h4>Fitness</h4>
                               <p>05 pm - 06 pm</p>
                               <div class="hover">
                                   <h4>Fitness</h4>
                                   <p>05 pm - 06 pm</p>
                                   <span>Wayne Ponce</span>
                               </div>
                           </td>
                           <td></td>
                       </tr>
                       <tr>
                           <td class="day">Saturday</td>
                           <td></td>
                           <td class="active">
                               <h4>Cardio</h4>
                               <p>11 am - 12 am</p>
                               <div class="hover">
                                   <h4>Cardio</h4>
                                   <p>11 am - 12 am</p>
                                   <span>David Warner</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Running</h4>
                               <p>03 pm - 04 pm</p>
                               <div class="hover">
                                   <h4>Running</h4>
                                   <p>03 pm - 04 pm</p>
                                   <span>Sophia Fuller</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Karate</h4>
                               <p>05 pm - 06 pm</p>
                               <div class="hover">
                                   <h4>Karate</h4>
                                   <p>05 pm - 06 pm</p>
                                   <span>Sophia Fuller</span>
                               </div>
                           </td>
                           <td class="active">
                               <h4>Dance</h4>
                               <p>07 pm - 08 pm</p>
                               <div class="hover">
                                   <h4>Dance</h4>
                                   <p>07 pm - 08 pm</p>
                                   <span>Joey Jackson</span>
                               </div>
                           </td>
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>
   </div>
</div>
