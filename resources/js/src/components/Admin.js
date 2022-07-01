import React, { useLayoutEffect, useEffect, useState } from "react";
import http from "../axios/http";
import { useParams, useHistory } from "react-router-dom";
function Admin(props) {
    const [usersData, setUsersData] = useState([]);
    const history = useHistory();
    useEffect(() => {
        http.get("/allusers").then((res) => {
            setUsersData(res.data);
        });
    }, []);

    function setAdmin(id) {
        http.post(`/setadmin/${id}`)
            .then((res) => {
                console.log(res);
                history.push("/");
            })
            .catch((err) => console.log(err));
    }

    return (
        <div>
            {usersData.map((doc) => (
                <div>
                    {doc.name}
                    <button
                        className="btn-primary btn"
                        onClick={() => setAdmin(doc.id)}
                    >
                        Set admin true
                    </button>
                </div>
            ))}
        </div>
    );
}

export default Admin;
