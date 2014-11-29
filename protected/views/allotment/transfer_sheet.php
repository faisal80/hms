<div class="row clearfix">
    <img style="float: left; height: 100px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kpk-logo.jpg"/>

    <div class="text-center pull-right" style="width: 400px;">
        <address>
            <strong><span style="font-size: 14pt; font-family: 'Bookman Old Style'">
                    OFFICE OF THE DIRECTOR GENERAL<br />
                    PROVINCIAL HOUSING AUTHORITY</span></strong><br />
            (ATI Campus) Jamrud Road, Peshawar<br />
            <small>Phone: +92 91 9218265 &nbsp; Fax: +92 91 9218420</small><br />
            <small>Website: www.housingkp.gov.pk &nbsp; Email: dg.pha@hotmail.com</small>
        </address>
    </div>
</div>

<div class="row text-center">
    <h2><?php echo $allotment->scheme->name; ?></h2>
    <h2><u>Transfer History</u></h2>
</div>
<div class="row">
    <p class="lead">Initial Allottee</p>
    <table class="table table-condensed table-striped table-hover">
        <tr>
            <td>Name</td><td><?php echo $allotment->applicant->name; ?></td>
            <td>Father Name</td><td><?php echo $allotment->applicant->fname; ?></td>
        </tr>
        <tr>
            <td>CNIC No.</td><td><?php echo $allotment->applicant->nic; ?></td>
            <td>Address</td><td><?php echo $allotment->applicant->postal_address; ?></td>
        </tr>
        <tr>
            <td>Plot No.</td><td><?php echo $allotment->plot_no; ?></td>
            <td>Street No.</td><td><?php echo $allotment->street_no; ?></td>
        </tr>
        <?php if(!empty($allotment->sector) || !empty($allotment->phase)): ?>
        <tr>
            <td>Sector</td><td><?php echo $allotment->sector; ?></td>
            <td>Phase</td><td><?php echo $allotment->phase; ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td>Plot Size</td><td><?php echo $allotment->category->plot_size . ($allotment->category->corner? ' (Corner)': ''); ?></td>
            <td>Category</td><td><?php echo $allotment->category->category; ?></td>
        </tr>
    </table>
</div>
<?php if(count($transfers)==2): ?>
<div class="row" style="border-top: 1px black solid;">
    <p class="lead">Transferred From</p>
    <table>
        <tr>
            <td width="70px">Name</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[1]->applicant->name; ?></td>
            <td width="100px">Father Name</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[1]->applicant->fname; ?></td>
        </tr>
        <tr>
            <td>CNIC No.</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[1]->applicant->nic; ?></td>
            <td>Address</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[1]->applicant->postal_address; ?></td>
        </tr>
        <tr>
            <td>Deed No.</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[1]->deed_no; ?></td>
            <td>Deed Date</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[1]->transfer_date; ?></td>
        </tr>
    </table>
</div>

<div class="row" style="border-top: 1px black solid;">
    <p class="lead">Transferred To</p>
    <table>
        <tr>
            <td width="70px">Name</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->applicant->name; ?></td>
            <td width="100px">Father Name</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->applicant->fname; ?></td>
        </tr>
        <tr>
            <td>CNIC No.</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->applicant->nic; ?></td>
            <td>Address</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->applicant->postal_address; ?></td>
        </tr>
        <tr>
            <td>Deed No.</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->deed_no; ?></td>
            <td>Deed Date</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->transfer_date; ?></td>
        </tr>
    </table>
</div>
<?php endif; ?>

<?php if(count($transfers)==1): ?>
<div class="row" style="border-top: 1px black solid;">
    <p class="lead">Transferred To</p>
    <table>
        <tr>
            <td width="70px">Name</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->applicant->name; ?></td>
            <td width="100px">Father Name</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->applicant->fname; ?></td>
        </tr>
        <tr>
            <td>CNIC No.</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->applicant->nic; ?></td>
            <td>Address</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->applicant->postal_address; ?></td>
        </tr>
        <tr>
            <td>Deed No.</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->deed_no; ?></td>
            <td>Deed Date</td><td style="border-bottom: 1px solid black;"><?php echo $transfers[0]->transfer_date; ?></td>
        </tr>
    </table>
</div>
<?php endif; ?>

<div class="text-center pull-right" style="width: 200px; margin-top: 65px;">
    <strong>Housing Officer-II</strong><br />
    Provincial Housing Authority
</div>