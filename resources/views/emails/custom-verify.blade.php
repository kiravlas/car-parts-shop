<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta
        name="color-scheme"
        content="light">

    <title>Verify Your Email</title>

</head>


<body
    style="
        margin: 0;
        padding: 0;
        background-color: #e8eee9;
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
        background-color: #e8eee9;
        padding: 40px 16px;
    "
>

    <tr>

        <td align="center">


            {{-- ============================================================
                 Main Email Container
            ============================================================ --}}

            <table
                width="600"
                cellpadding="0"
                cellspacing="0"
                border="0"
                style="
                    width: 100%;
                    max-width: 600px;
                    background-color: #ffffff;
                    border-radius: 20px;
                    overflow: hidden;
                "
            >


                {{-- ========================================================
                     Header
                ========================================================= --}}

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
                                line-height: 1;
                                font-weight: 800;
                                letter-spacing: -0.5px;
                                color: #ffffff;
                            "
                        >
                            Need4Parts
                        </div>


                        <div
                            style="
                                margin-top: 10px;
                                font-size: 13px;
                                line-height: 1.5;
                                color: #d1fae5;
                            "
                        >
                            Quality parts. Better driving.
                        </div>

                    </td>

                </tr>


                {{-- ========================================================
                     Main Content
                ========================================================= --}}

                <tr>

                    <td
                        style="
                            padding: 45px 40px;
                        "
                    >


                        {{-- Email icon --}}

                        <table
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                margin: 0 auto;
                            "
                        >

                            <tr>

                                <td
                                    width="64"
                                    height="64"
                                    align="center"
                                    valign="middle"
                                    style="
                                        width: 64px;
                                        height: 64px;
                                        background-color: #ecfdf5;
                                        border-radius: 50%;
                                        font-size: 28px;
                                    "
                                >
                                    ✉️
                                </td>

                            </tr>

                        </table>


                        {{-- Heading --}}

                        <h1
                            style="
                                margin: 25px 0 0;
                                text-align: center;
                                font-size: 30px;
                                line-height: 1.3;
                                font-weight: 800;
                                color: #064e3b;
                            "
                        >
                            Verify Your Email
                        </h1>


                        {{-- Greeting --}}

                        <p
                            style="
                                margin: 22px 0 0;
                                text-align: center;
                                font-size: 16px;
                                line-height: 1.7;
                                color: #374151;
                            "
                        >
                            Hi
                            <strong style="color: #065f46;">
                                {{ $user->name }}
                            </strong>,
                        </p>


                        <p
                            style="
                                margin: 12px 0 0;
                                text-align: center;
                                font-size: 15px;
                                line-height: 1.7;
                                color: #6b7280;
                            "
                        >
                            Thanks for creating your Need4Parts account.
                            Please verify your email address to complete
                            your registration.
                        </p>


                        {{-- ==================================================
                             CTA
                        =================================================== --}}

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                margin-top: 32px;
                            "
                        >

                            <tr>

                                <td align="center">

                                    <a
                                        href="{{ $url }}"
                                        style="
                                            display: inline-block;
                                            padding: 15px 32px;
                                            background-color: #16a34a;
                                            border-radius: 10px;
                                            color: #ffffff;
                                            font-size: 15px;
                                            line-height: 1;
                                            font-weight: 700;
                                            text-decoration: none;
                                        "
                                    >
                                        Verify My Email
                                    </a>

                                </td>

                            </tr>

                        </table>


                        {{-- Expiration / information --}}

                        <p
                            style="
                                margin: 24px 0 0;
                                text-align: center;
                                font-size: 13px;
                                line-height: 1.6;
                                color: #9ca3af;
                            "
                        >
                            This verification link may expire for security
                            reasons.
                        </p>


                        {{-- ==================================================
                             Security Notice
                        =================================================== --}}

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            style="
                                margin-top: 35px;
                            "
                        >

                            <tr>

                                <td
                                    style="
                                        padding: 18px 20px;
                                        background-color: #f0fdf4;
                                        border-left: 4px solid #16a34a;
                                        border-radius: 10px;
                                    "
                                >

                                    <div
                                        style="
                                            font-size: 14px;
                                            font-weight: 700;
                                            color: #065f46;
                                        "
                                    >
                                        Didn't create an account?
                                    </div>


                                    <div
                                        style="
                                            margin-top: 6px;
                                            font-size: 13px;
                                            line-height: 1.6;
                                            color: #6b7280;
                                        "
                                    >
                                        You can safely ignore this email.
                                        No action is required.
                                    </div>

                                </td>

                            </tr>

                        </table>


                        {{-- ==================================================
                             Fallback URL
                        =================================================== --}}

                        <p
                            style="
                                margin: 32px 0 0;
                                font-size: 12px;
                                line-height: 1.6;
                                color: #9ca3af;
                            "
                        >
                            If the button above doesn't work, copy and paste
                            this link into your browser:
                        </p>


                        <p
                            style="
                                margin: 8px 0 0;
                                word-break: break-all;
                                font-size: 12px;
                                line-height: 1.6;
                            "
                        >

                            <a
                                href="{{ $url }}"
                                style="
                                    color: #047857;
                                    text-decoration: underline;
                                "
                            >
                                {{ $url }}
                            </a>

                        </p>


                    </td>

                </tr>


                {{-- ========================================================
                     Footer
                ========================================================= --}}

                <tr>

                    <td
                        style="
                            padding: 25px 40px;
                            background-color: #f0fdf4;
                            border-top: 1px solid #d1d5db;
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
                                margin-top: 7px;
                                font-size: 12px;
                                line-height: 1.5;
                                color: #6b7280;
                            "
                        >
                            Quality automotive parts for every journey.
                        </div>


                        <div
                            style="
                                margin-top: 14px;
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
