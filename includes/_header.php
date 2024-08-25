<header>
    <h1>Je suis <span class="dynamic-text" id="dynamicText"></span></h1>
    <div id="background"></div>


    <svg id="svg" width="100" height="200" xmlns="http://www.w3.org/2000/svg">
        <rect x="30" y="10" rx="20" ry="20" width="40" height="80" fill="none" stroke="white" stroke-width="3"/>
        <circle cx="50" cy="40" r="5" fill="white">
            <animate 
            attributeName="cy" 
            from="40" 
            to="60" 
            dur="1s" 
            repeatCount="indefinite" 
            fill="freeze" />
        </circle>
        <line x1="50" y1="70" x2="50" y2="90" stroke="white" stroke-width="3" stroke-linecap="round">
            <animate 
            attributeName="y1" 
            from="70" 
            to="90" 
            dur="1s" 
            repeatCount="indefinite" 
            fill="freeze" />
            <animate 
            attributeName="y2" 
            from="90" 
            to="110" 
            dur="1s" 
            repeatCount="indefinite" 
            fill="freeze" />
        </line>
        <polygon points="50,90 45,85 55,85" fill="white">
            <animate 
            attributeName="points" 
            from="50,90 45,85 55,85" 
            to="50,110 45,105 55,105" 
            dur="1s" 
            repeatCount="indefinite" 
            fill="freeze" />
        </polygon>
    </svg>


</header>