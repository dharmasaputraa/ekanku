document.addEventListener("DOMContentLoaded", function (event) {
    const showNavbar = (
        toggleId,
        navId,
        bodyId,
        headerId,
        logoID,
        titleID,
        titleID2,
        titleID3
    ) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId),
            navlogo = document.getElementById(logoID),
            titlepd = document.getElementById(titleID),
            titlepd2 = document.getElementById(titleID2),
            titlepd3 = document.getElementById(titleID3);

        if (
            toggle &&
            nav &&
            bodypd &&
            headerpd &&
            navlogo &&
            titlepd &&
            titleID2 &&
            titleID3
        ) {
            toggle.addEventListener("click", () => {
                // show navbar
                nav.classList.toggle("show");
                // change icon
                toggle.classList.toggle("bx-x");
                // add padding to body
                bodypd.classList.toggle("body-pd");
                // add padding to header
                headerpd.classList.toggle("body-pd");
                // add display none to navlogo
                navlogo.classList.toggle("logo-none");
                // add display none to navlogo
                titlepd.classList.toggle("logo-none");
                titlepd2.classList.toggle("logo-none");
                titlepd3.classList.toggle("logo-none");
            });
        }
    };

    showNavbar(
        "header-toggle",
        "nav-bar",
        "body-pd",
        "header",
        "nav_logo",
        "nav_title",
        "nav_title2",
        "nav_title3"
    );

    const linkColor = document.querySelectorAll(".nav_link");

    function colorLink() {
        if (linkColor) {
            linkColor.forEach((l) => l.classList.remove("active"));
            this.classList.add("active");
        }
    }
    linkColor.forEach((l) => l.addEventListener("click", colorLink));
});
