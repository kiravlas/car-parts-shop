<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Welcome to Need4Parts</title>
</head>

<body
    style="
        margin: 0;
        padding: 0;
        background-color: #dfe7e2;
        font-family: Arial, Helvetica, sans-serif;
        color: #1f2937;
    "
>

<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    style="
        width: 100%;
        background-color: #dfe7e2;
        padding: 40px 20px;
    "
>

    <tr>
        <td align="center">


            {{-- Email container --}}
            <table
                width="600"
                cellpadding="0"
                cellspacing="0"
                border="0"
                style="
                    width: 100%;
                    max-width: 600px;
                    background-color: #ffffff;
                    border-radius: 18px;
                    overflow: hidden;
                "
            >


                {{-- Header --}}
                <tr>

                    <td
                        style="
                            background-color: #064e3b;
                            padding: 32px 40px;
                            text-align: center;
                        "
                    >

                        <div
                            style="
                                font-size: 28px;
                                font-weight: 800;
                                color: #ffffff;
                                letter-spacing: -0.5px;
                            "
                        >
                            Need4Parts
                        </div>


                        <div
                            style="
                                margin-top: 8px;
                                font-size: 14px;
                                color: #d1fae5;
                            "
                        >
                            Quality parts. Better driving.
                        </div>

                    </td>

                </tr>


                {{-- Main content --}}
                <tr>

                    <td
                        style="
                            padding: 45px 40px;
                        "
                    >


                        {{-- Greeting --}}
                        <h1
                            style="
                                margin: 0;
                                font-size: 30px;
                                line-height: 1.3;
                                color: #064e3b;
                                font-weight: 800;
                            "
                        >
                            Welcome, {{ $user->name }}! 👋
                        </h1>


                        <p
                            style="
                                margin: 22px 0 0;
                                font-size: 16px;
                                line-height: 1.7;
                                color: #4b5563;
                            "
                        >
                            We're happy to have you at
                            <strong style="color: #064e3b;">
                                Need4Parts
                            </strong>.
                            Your account is ready, and you're now part of
                            our community of drivers and car enthusiasts.
                        </p>


                        {{-- Highlight box --}}
                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                margin-top: 30px;
                            "
                        >

                            <tr>

                                <td
                                    style="
                                        background-color: #ecfdf5;
                                        border-left: 4px solid #16a34a;
                                        border-radius: 10px;
                                        padding: 20px;
                                    "
                                >

                                    <div
                                        style="
                                            font-size: 16px;
                                            font-weight: 700;
                                            color: #065f46;
                                        "
                                    >
                                        Your account is ready 🚗
                                    </div>


                                    <div
                                        style="
                                            margin-top: 7px;
                                            font-size: 14px;
                                            line-height: 1.6;
                                            color: #4b5563;
                                        "
                                    >
                                        Find the parts you need,
                                        keep track of your orders,
                                        and get back on the road.
                                    </div>

                                </td>

                            </tr>

                        </table>


                        {{-- CTA --}}
                        <table
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                margin-top: 35px;
                            "
                        >

                            <tr>

                                <td
                                    align="center"
                                    style="
                                        background-color: #16a34a;
                                        border-radius: 10px;
                                    "
                                >

                                    <a
                                        href="{{ route('home.index') }}"
                                        style="
                                            display: inline-block;
                                            padding: 15px 28px;
                                            color: #ffffff;
                                            font-size: 15px;
                                            font-weight: 700;
                                            text-decoration: none;
                                        "
                                    >
                                        Start Shopping
                                    </a>

                                </td>

                            </tr>

                        </table>


                        {{-- Features --}}
                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                margin-top: 40px;
                            "
                        >

                            <tr>


                                <td
                                    width="33%"
                                    valign="top"
                                    style="
                                        padding-right: 10px;
                                        text-align: center;
                                    "
                                >

                                    <div
                                        style="
                                            font-size: 25px;
                                        "
                                    >
                                        🛠️
                                    </div>

                                    <div
                                        style="
                                            margin-top: 8px;
                                            font-size: 13px;
                                            font-weight: 700;
                                            color: #374151;
                                        "
                                    >
                                        Quality Parts
                                    </div>

                                </td>


                                <td
                                    width="33%"
                                    valign="top"
                                    style="
                                        padding: 0 10px;
                                        text-align: center;
                                    "
                                >

                                    <div
                                        style="
                                            font-size: 25px;
                                        "
                                    >
                                        🚚
                                    </div>

                                    <div
                                        style="
                                            margin-top: 8px;
                                            font-size: 13px;
                                            font-weight: 700;
                                            color: #374151;
                                        "
                                    >
                                        Fast Delivery
                                    </div>

                                </td>


                                <td
                                    width="33%"
                                    valign="top"
                                    style="
                                        padding-left: 10px;
                                        text-align: center;
                                    "
                                >

                                    <div
                                        style="
                                            font-size: 25px;
                                        "
                                    >
                                        🔒
                                    </div>

                                    <div
                                        style="
                                            margin-top: 8px;
                                            font-size: 13px;
                                            font-weight: 700;
                                            color: #374151;
                                        "
                                    >
                                        Secure Shopping
                                    </div>

                                </td>


                            </tr>

                        </table>


                        {{-- Closing --}}
                        <p
                            style="
                                margin: 40px 0 0;
                                font-size: 15px;
                                line-height: 1.7;
                                color: #4b5563;
                            "
                        >
                            Thanks for choosing Need4Parts.
                            We hope you find everything you need for
                            your vehicle.
                        </p>


                        <p
                            style="
                                margin: 20px 0 0;
                                font-size: 15px;
                                line-height: 1.6;
                                color: #374151;
                            "
                        >
                            Happy driving! 🚗
                        </p>


                    </td>

                </tr>


                {{-- Footer --}}
                <tr>

                    <td
                        style="
                            background-color: #f0fdf4;
                            border-top: 1px solid #d1d5db;
                            padding: 25px 40px;
                            text-align: center;
                        "
                    >

                        <div
                            style="
                                font-size: 13px;
                                font-weight: 700;
                                color: #065f46;
                            "
                        >
                            Need4Parts
                        </div>


                        <div
                            style="
                                margin-top: 8px;
                                font-size: 12px;
                                line-height: 1.5;
                                color: #6b7280;
                            "
                        >
                            Quality automotive parts for every journey.
                        </div>


                        <div
                            style="
                                margin-top: 15px;
                                font-size: 11px;
                                color: #9ca3af;
                            "
                        >
                            © {{ date('Y') }} Need4Parts.
                            All rights reserved.
                        </div>

                    </td>

                </tr>


            </table>


        </td>
    </tr>

</table>

</body>
</html>
