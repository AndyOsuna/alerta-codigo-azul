const { Router } = require("express"),
  router = Router(),
  pool = require("../db");

router.get("/", (req, res) => {
  res.render("index");
});
router.get("/login", (req, res) => {
  const users = pool.query("SELECT * FROM usuarios");

  res.render("login", { users });
});
router.post("/login", (req, res) => {
  const { username, password } = req.body;
});

module.exports = router;
