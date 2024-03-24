
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
import java.io.IOException;
public class biography extends HttpServlet {
    protected void doGet(HttpServletRequest rq, HttpServletResponse rs)
            throws ServletException,IOException{
        rs.setContentType("text/html;charset=UTF-8");
        PrintWriter pr = rs.getWriter();
        String name = rq.getParameter("userName");
        HttpSession ss = rq.getSession();
        ss.setAttribute("userName", name);
        String Hero = rq.getParameter("SelectedHero");
        String theHeroIs = "";
        if(Hero != null && !Hero.isEmpty())
        {
            if("Virat Kholi".equals(Hero))
                theHeroIs += "Virat Kholi.jsp";
            else if("A P J Abdul Kalam".equals(Hero))
                theHeroIs += "AbdulKalamSir.jsp";
            else if("Stephen Hawking".equals(Hero))
                theHeroIs += "StephenHawkingSir.jsp";
            else if("Albert Einstein".equals(Hero))
                theHeroIs += "AlbertEinsteinSir.jsp";
            else if("Ironman".equals(Hero))
                theHeroIs += "Iron man.jsp";
            else
                pr.println("No hero is Selected");
        }
        rs.sendRedirect(theHeroIs);
    }
}   

