/* _____________________________script # 1___________________________________________________*/  
This JavaScript function serves two main purposes within a web page:

Smooth Scrolling to Sections:

This part of the function ensures that when a user clicks on a link leading to a section within the same page (indicated by the presence of "#" in the href attribute), the page smoothly scrolls to that section instead of instantly jumping to it.
It achieves this by attaching an event listener to all such anchor elements.
When clicked, it prevents the default behavior (i.e., jumping to the section immediately).
It then retrieves the target section by selecting the element with the ID matching the href attribute of the clicked anchor.
Finally, it smoothly scrolls to the target section using the scrollIntoView method with the behavior option set to 'smooth'.

Adding Active Class to Navigation Links Based on Scroll Position:

This part of the function dynamically adds an "active" class to navigation links based on the user's scroll position.
It listens for the scroll event on the window.
Upon scrolling, it iterates over all sections of the page.
For each section, it determines whether the current scroll position is within one-third of the section's height from its top.
If so, it identifies the corresponding navigation link and adds the "active" class to it, indicating the user's current position on the page.
This creates a visual indication, typically highlighting or styling the active navigation link, to provide users with context about which section they are viewing.