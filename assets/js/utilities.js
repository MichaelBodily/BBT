// break out of iFrame in case window is captured
if (top.location!= self.location) {
    top.location = self.location.href;
 }