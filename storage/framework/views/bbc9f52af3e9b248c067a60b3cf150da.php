<?php
// $token ="mtVNZSBUKNqoXyJa6mWbIo1RCiscc39O";
   $token_data = \App\Models\Token::where('token',$token)->first();
   $customer_details = \App\Models\CustomerAddress::where('user_id',Auth::user()->id)->first();
   $name = Auth::user()->name;

//    $victimdata = [
//         "name" => 'Monu',
//         "father_name" => 'Sonu',
//         "address" => 'Ras',
//         "date_of_birth" => '23/04/1992',  
//     ];
//     $caseCount = ['case_count' => 19];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Background Screening Report </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        /* Deepak Code */
        .identity-check {
            display: flex;
            align-items: center;
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 16px;
            color: #000;
        }

        .identity-check::before,
        .identity-check::after {
            content: '';
            flex-grow: 1;
            height: 1px;
            background-color: #000;
            margin: 0 10px;
        }

        /* @page {
            size: A4;
            margin: 20mm;
           
        }

        .a4 {
            width: 210mm;
            height: 297mm;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20mm;
            overflow: hidden;
            box-sizing: border-box;
        } */

        .info-table th {
            background-color: #f2f2f2;
            width: 25%;
        }


        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            border-top: 8px solid black;
            background-color: #fff;
            border-bottom: 1px solid black;
            margin-bottom: 30px;
        }

        .logo img {
            height: 50px;
        }

        .logo {
            border-right: 1px solid rgb(110, 109, 109);
        }




        .company-details {
            text-align: right;
        }

        .company-details p {
            margin: 0;
            font-size: 14px;
            line-height: 1.4;
        }

        .company-details p.bold {
            font-weight: bold;
        }

        /* Deepak Code end */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }



        .client-info,
        .report-info {
            margin-bottom: 50px;
        }

        .client-info h2,
        .report-info h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-table th,
        .info-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }


        footer {
            background-color: #f9f9f9;
            font-size: 12px;
            color: #000;
            text-align: center;
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #eaeaea;
        }


        .footer-disclaimer {
            text-align: justify;
            padding: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="a4">

        <div class="header">
            <table>
                <tr>
                    <td style="margin-right: 10px; width: 300px; text-align: left;"> 
                        <div class="col-md-6 logo">
                            <img src="<?php echo e(public_path('front-assets/images/footer_logo.png')); ?>" alt="SearchAI Logo">
                        </div>
                    </td>
                    <td style="margin-right: 10px; width: 300px; text-align: left;">
                        <div class="col-md-4 company-details">
                            <p>A 24/5, Mohan Cooperative Industrial Area, <br>Badarpur, Secound Floor, <br><strong>New Delhi 110044</strong></p>
                        </div>
                    </td>
                </tr>
            </table>
           
        </div>


        <section class="client-info">
            <div class="identity-check">CRIMINAL BACKGROUND SCREENING REPORT</div>

            <table class="info-table">
                <tr>
                    <th>Client Name</th>
                    <td><?php echo e($name); ?></td>
                </tr>
                <tr>
                    <th>Order ID</th>
                    <td>OT-<?php echo e($token_data->order_id); ?></td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td><?php echo e($customer_details->phone); ?></td>
                </tr>
                <tr>
                    <th>Report Date</th>
                    <td><?php echo e(date('d-m-Y', strtotime($token_data->updated_at))); ?></td>
                </tr>
            </table>
        </section>

        <section class="report-info">
            <div class="identity-check">CRIMINAL CHECK DETAILS</div>
            <table class="info-table">
                <tr>
                    <th>Name of the applicant
                    </th>
                    <td><?php echo e($victimdata['name']); ?></td>
                </tr>
                <tr>
                    <th>Father's Name/Care of</th>
                    <td><?php echo e($victimdata['father_name'] ?? ''); ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo e($victimdata['address']); ?></td>
                </tr>
                <tr>
                    <th>DOB</th>
                    <td><?php echo e($victimdata['date_of_birth']); ?></td>
                </tr>
                <tr>
                    <th>Check Status</th>
                    <td>
                        <?php if(is_array($caseCount) && isset($caseCount['case_count'])): ?>
                            Case: <?php echo e($caseCount['case_count']); ?>

                        <?php else: ?>
                            Cleared
                        <?php endif; ?>
                    </td>
                    
                </tr>
                
            </table>
        </section>

        <?php if(count($cases)>0): ?>
        <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="report-info">
            <div class="identity-check">CASE DETAILS</div>
            <table class="info-table">
                <tr>
                    <th>Source</th>
                    <td><?php echo e($case['source']  ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>State Name</th>
                    <td><?php echo e($case['state_name'] ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>District Name</th>
                    <td><?php echo e($case['district_name'] ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>Court Name</th>
                    <td><?php echo e($case['court_name'] ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>Case Category</th>
                    <td><?php echo e($case['case_category'] ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>Under Acts</th>
                    <td><?php echo e($case['under_acts'] ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>Under Sections</th>
                    <td><?php echo e($case['under_sections'] ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>Case Status</th>
                    <td><?php echo e($case['case_status'] ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>Filing Date</th>
                    <td><?php echo e($case['filing_date'] ?? '--'); ?></td>
                </tr>
                <tr>
                    <th>Decision Date</th>
                    <td><?php echo e($case['decision_date'] ?? '--'); ?></td>
                </tr>
                
            </table>
        </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <table class="info-table">
            <tr>
                <td colspan="10">No cases available (case_count is zero)</td>
            </tr>
        </table>
        <?php endif; ?>
        <div style="page-break-before: always;"></div>
        <footer>
            <div class="footer-disclaimer">
                <h4 style="text-align: center;"><strong><u>LEGAL DISCLAIMER</u></strong></h4>
                </h4>
                <p class="text-wrap mt-4 p-4">All rights reserved. The report and its contents are the property of
                    SearchAI (operated by Navigant Digital
                    Pvt. Ltd.) and may not be reproduced in any manner without the express written permission of
                    SearchAI.<br>
                    The reports and information contained herein are confidential and are meant only for the
                    internal use of
                    the SearchAI client for assessing the background of their applicant. The information and report
                    are
                    subject to change based on changes in factual information.<br>
                    Information and reports, including text, graphics, links, or other items, are provided on an "as
                    is," "as
                    available" basis. SearchAI expressly disclaims liability for errors or omissions in the report,
                    information, and
                    materials, as the information is obtained from various sources as per industry practice. No
                    warranty of any
                    kind implied, express, or statutory including but not limited to the warranties of
                    non-infringement of third
                    party rights, title, merchantability, fitness for a particular purpose, and freedom from
                    computer viruses, is
                    given in conjunction with the information and materials.<br>
                    Our findings are based on the information available to us and industry practice; therefore, we
                    cannot
                    guarantee the accuracy of the information collected. Should additional information or
                    documentation
                    become available that impacts our conclusions, we reserve the right to amend our findings
                    accordingly.<br>
                    These reports are not intended for publication or circulation. They should not be shared with
                    any other
                    person, including the applicant, nor reproduced for any other purpose, in whole or in part,
                    without prior
                    written consent from SearchAI in each specific instance. Our reports cannot be relied upon by
                    any other
                    person, and we expressly disclaim all responsibility or liability for any costs, damages,
                    losses, or expenses
                    incurred by anyone as a result of the circulation, publication, reproduction, or use of our
                    reports contrary to
                    the provisions of this paragraph.<br>
                    The report and information consist of statements of opinion and not statements of fact or
                    recommendations. You should obtain any additional information necessary to make an informed
                    decision
                    prior to using the report. SearchAI and its directors, officers, agents, and representatives
                    assume (and
                    hereby disclaim) all responsibility or liability that may arise directly or indirectly from the
                    usage of such
                    reports.<br>
                    Due to the limitations mentioned above, the result of our work with respect to background checks
                    should
                    be considered only as a guideline. Our reports and comments should not be considered a
                    definitive
                    pronouncement on the individual.</p>
            </div>
            <p style="font-size: 16px;">SearchAI Confidential</p>
            <br class="mb-4">
        </footer>
    </div>

</body>

</html>
<?php /**PATH /home/gbalz51c0wat/public_html/searchai.space/resources/views/pdf/ccrv_report.blade.php ENDPATH**/ ?>