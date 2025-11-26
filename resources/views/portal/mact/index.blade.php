<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Accident Tribunal Dashboard - Nagaland</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e3f2fd, #f1f8e9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .dashboard-header {
            background: linear-gradient(90deg, #004085, #0069d9, #17a2b8);
            color: white;
            padding: 15px 20px;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dashboard-header h2 {
            margin: 0;
            font-weight: bold;
        }
        /* Updated Home Button Style */
        .btn-home {
            background: linear-gradient(45deg, #28a745, #5cd65c);
            color: white;
            font-weight: bold;
            border-radius: 50px;
            padding: 8px 20px;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            text-decoration: none;
        }
        .btn-home:hover {
            background: linear-gradient(45deg, #218838, #4caf50);
            color: white;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.3);
        }
        .table-container {
            background: white;
            padding: 0;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        table thead {
            background: linear-gradient(90deg, #004085, #007bff);
            color: white;
        }
        table th, table td {
            vertical-align: middle;
            text-align: center;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tbody tr:hover {
            background-color: #e0f7fa;
            transition: background-color 0.3s ease;
        }
        tfoot {
            background-color: #ffeeba;
            font-weight: bold;
        }
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="table-container">
        <!-- Dashboard Header with Home Button -->
        <div class="dashboard-header">
            <h2>Motor Accident Tribunal Dashboard - Nagaland</h2>
            <a href="https://mact.hcnlservices.in/" class="btn-home">🏠 Home</a>
        </div>

        <!-- Responsive Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>District Courts</th>
                        <th>Award Money Deposited</th>
                        <th>Amount to be Disbursed</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>MACT - Kohima</td>
                        <td>₹ 11,74,560.00</td>
                        <td>₹ 11,74,560.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>MACT - Dimapur</td>
                        <td>₹ 42,01,673.00</td>
                        <td>₹ 42,01,673.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>MACT - Mokokchung</td>
                        <td>₹ 30,45,02,812.00</td>
                        <td>₹ 30,45,02,812.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>MACT - Wokha</td>
                        <td>₹ 10,14,000.00</td>
                        <td>₹ 10,14,000.00</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>MACT - Kiphire</td>
                        <td>NIL</td>
                        <td>NIL</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>MACT - Peren</td>
                        <td>NIL</td>
                        <td>NIL</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>MACT - Phek</td>
                        <td>₹ 17,27,500.00</td>
                        <td>₹ 17,27,500.00</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>MACT - Zunheboto</td>
                        <td>NIL</td>
                        <td>NIL</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>MACT - Mon</td>
                        <td>NIL</td>
                        <td>NIL</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>MACT - Tuensang</td>
                        <td>₹ 22,04,620.00</td>
                        <td>₹ 22,04,620.00</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>MACT - Longleng</td>
                        <td>NIL</td>
                        <td>NIL</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">TOTAL</td>
                        <td>₹ 31,48,25,165.00</td>
                        <td>₹ 31,38,11,165.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
