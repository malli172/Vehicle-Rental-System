function getpdf()
{
    const ele = document.getElementById("Inner");
    html2pdf()
    .from(ele)
    .save();
}